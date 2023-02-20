<?php 

session_start();

// Si no existe la sesión con etiqueta 'usuario' es que no se creó la
// Sesión y, por tanto, no está permitido entrar en esta página.
// Automáticamente se es redireccionado al Ejer6.php (Login)
if (!isset($_SESSION['usuario']))
   header('Location: Ejer6.php');  

include_once 'claseConexionBD.php';

// Inicializar variables a mostrar en formulario
$error = array('errNombre' => '', 'errPvp' => '');
$nombre = ''; $pvp = '';
$prod_insertado = ''; 

// Tratamiento del formulario
if ( isset($_POST['Enviar']) ) {   // Se ha pulsado el botón de Enviar 

   $nombre = $_POST['nombre']; 
   $pvp = $_POST['pvp']; 
    
   $error = validar_datos($_POST);
   
   if ( $error['errNombre'] == "" && $error['errPvp'] == "" ) { // no hay errores
      $prod_insertado = insertar_producto($_POST);
   }  
   
   unset($_POST['Enviar']);  // Se ha pulsado el botón Enviar. Limpiar la pulsación
                             // para que esté de nuevo disponible. 
} 
else if ( isset($_POST['Limpiar']) ) {   // Se ha pulsado el botón de Limpiar
   $error = null;  $tabla = '';  $nombre = '';  $pvp = '';

   unset($_POST['Limpiar']);  // Se ha pulsado el botón Limpiar. Limpiar la pulsación
                              // para que esté de nuevo disponible. 
}
 
function validar_datos($datos) {

   $errmsg = array('errNombre' => '', 'errPvp' => '');
    
   if ( $datos['nombre'] == "" )
      $errmsg['errNombre'] = "Debe introducir el nombre del producto";

   if ( $datos['pvp'] == "" )
      $errmsg['errPvp'] = "Debe introducir el precio del producto";

   if ( $datos['nombre'] != "" && $datos['pvp'] != "" ) {
      if ( !is_numeric($datos['pvp']) )
         $errmsg['errPvp'] = 'Precio: <b>'.$datos['pvp'].'</b> Debe ser numérico <br/>';
      if ( !preg_match('/^[a-zñÑáéíóú\d_\s]{1,28}$/i', $datos['nombre']) )
         $errmsg['errNombre'] = 'Nombre: <b>'.$datos['nombre'].'</b> Debe ser alfanumérico <br/>';
   }
    
   return $errmsg;
}

/* Genera un control select simple con los cifs de los proveedores. Admite un 
   posible parámetro de entrada para indicar si alguno de los cifs está seleccionado.
 */
function lista_proveedores($selec='') {
   try
   {  
      $BD = new ConectarBD();   
      $conn = $BD->getConexion(); 
        
      $sql = 'SELECT cif, nom_emp FROM proveedores';
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);

      // Empezar a generar el control HTML de tipo SELECT SIMPLE 
      $salida = '';
      $salida .= "<select class=\"form-control\" name='selProveedor'><br/>";
      while ( $prov = $stmt->fetch() ) {
         if ( $prov['cif'] == $selec )
            $salida .= "  <option value='" . $prov['cif'] . "' selected=\"selected\" >" . $prov['cif']. " " . $prov['nom_emp'] . "</option><br/>"; 
         else    
            $salida .= "  <option value='" . $prov['cif'] . "'>" . $prov['cif']. " " . $prov['nom_emp'] . "</option><br/>";
      }
      $salida .= '</select><br/>';

      $stmt->closeCursor();
       
      $BD->cerrarConexion();

      return $salida;   

   } catch(PDOException $e) {
      $BD->cerrarConexion();
      die ("¡Error!: " . $e->getMessage() . "<br/>");        
   }      
}

/* Realiza la inserción en la BD de un producto indicado como parámetro.
 * Devuelve una cadena de caracteres en formato tabla con los datos de la 
 * fila insertada.
 */   
function insertar_producto($producto) {

   $nombre = $producto['nombre'];
   $precio = $producto['pvp'];
   $proveedor = $producto['selProveedor']; 
    
   $salida = '';
    
   try
   { 
      $BD = new ConectarBD();   
      $con = $BD->getConexion(); 
        
      $sql = 'SELECT max(cod)+1 as cod FROM productos';
      $stmt = $con->prepare($sql);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $codigo = $stmt->fetch();

      $stmt = $con->prepare('INSERT INTO productos VALUES '
                                 . '(:cod, :nom_prod, :pvp, :proveedor, :imagen, :imagen2)');
      $stmt->execute( array( ':cod' => $codigo['cod'],
                              ':nom_prod' => $nombre,
                              ':pvp' => $precio,
                              ':proveedor' => $proveedor,
                              ':imagen' => 'Girls make games.jpg',
                              ':imagen2' => 'Girls make games.jpg') );

      if ( $stmt->rowCount() == 1 ) {
         $salida .= '<p class="text-center"><h4>Datos insertados</h4></p>'; 
         $salida .= '<table class=" table table-striped"><tr>';  
         $salida .= "<td>".$codigo['cod']."</td><td>".$nombre."</td><td>".
                           $precio."</td/><td>".$proveedor."</td>";
         $salida .= '</tr></table><br>';
      }
      $stmt->closeCursor();
        
      $BD->cerrarConexion();

      return $salida;
        
   } catch(PDOException $e) {
      $BD->cerrarConexion(); 
      die ("¡Error!: " . $e->getMessage() . "<br/>");
   }

}  
    
?>

<!-- Parte cliente del script PHP.

   Presenta un formulario de entrada con el nombre y precio del producto, así
   como un control de tipo SELECT SIMPLE para seleccionar el CIF del proveedor.
   En caso de errores de validación después de pulsar el botón Enviar, se 
   mantienen los datos introducidos.
   Presenta mensajes de error justo debajo de cada campo del formulario.
   En caso de inserción correcta en BD, muestra los datos insertados en forma de tabla. 
-->     

<!DOCTYPE html>

<html>
   <head> 
      <meta charset="utf-8"/>
      <title>Ejercicio 7 Alta</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <link rel='stylesheet' type='text/css' href='css/estilos_flex.css' />      
   </head> 
   <body> 
      
      <header>
         <?php include_once 'cabecera.php'; ?>
      </header>
     
      <?php include_once 'navegacion.php'; ?>   
       
      <section>    
         <div id="caja1">
            
            <div><p>Conectado como usuario: <strong> 
               <?php echo $_SESSION['usuario'] ?></strong><p> </div>
                
               <div id="alta">
                  <form class="form-horizontal" action="" method="post">
                        
                     <label for="nombre">Nombre:</label>                 
                     <input type="text" class="form-control" name="nombre" id="nombre" 
                              value="<?php echo $nombre; ?>"  
                              placeholder="Nombre Producto"/>
                        
                     <p class='alert-danger'><?php echo $error['errNombre']; ?></p>
                       
                     <label for="precio">Precio:</label>                    
                     <input type="text" class="form-control" name="pvp" id="precio" 
                              value="<?php echo $pvp; ?>"  
                              placeholder="Precio Producto" />
                        
                     <p class='alert-danger'><?php echo $error['errPvp']; ?></p>
                       
                     <label for="proveedor">Proveedor:</label>                 
                     <?php if (isset($_POST['selProveedor']))
                              echo lista_proveedores($_POST['selProveedor']); 
                           else 
                              echo lista_proveedores(); 
                     ?>
                                        
                     <div>
                        <button type="submit" class="btn btn-primary" name="Enviar" 
                                 value="Enviar">Insertar</button>
                        <button type="submit" class="btn btn-primary" name="Limpìar" 
                                 value="Limpiar">Limpiar</button>
                     </div>
                         
                  </form>
               </div>    
            </div>  
            
            <aside>
               <?php include_once 'aside.php'; ?> 
            </aside>
            
        </section>    
          
        <article class="col-xs-12 col-sm-8">  
            <?php echo $prod_insertado; ?> 
        </article>  
         
        <footer>
            <?php include_once 'pie.php'; ?>
        </footer>
    </body>
</html>           