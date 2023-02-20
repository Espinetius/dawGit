<?php 

session_start();

if (!isset($_SESSION['usuario']))
   header('Location: Ejer6.php');  

include_once 'claseConexionBD.php';

// Función Principal

$cod = $_GET['p'];
$prod = obtener_Producto($cod);  // Datos del producto para el código recibido
                                 // del script anterior

// Inicializar variables a mostrar en formulario
$error = array('errNombre' => '', 'errPvp' => '');
$nombre = ''; $pvp = '';
$prod_insertado = ''; 
$operealizada = '';

// Tratamiento del formulario
if ( isset($_POST['Enviar']) ) { 

    $nombre = $_POST['nombre']; 
    $pvp = $_POST['pvp']; 
    $proveedor = $_POST['selProveedor'];
    
    $error = validar_datos($_POST);
   
    if ( $error['errNombre'] == "" && $error['errPvp'] == "" ) { // no hay errores
        $num_updates = modificar_producto($_POST);
        if ( $num_updates > 0)
            $operealizada = 'Modificación realizada con éxito';
        else
            $operealizada = 'No se pudo realizar la modificación';
    } 
    unset($_POST);
   
    // Establecer los nuevos datos de $producto
    $prod['nom_prod'] = $nombre;
    $prod['pvp'] = $pvp;
    $prod['prov'] = $proveedor;
         
} 
else if ( isset($_POST['Limpiar']) ) {
    $error = null;  $tabla = '';  $nombre = '';  $pvp = '';
    unset($_POST['Limpiar']);
}


function obtener_producto($cod)
{
    $BD = new ConectarBD();   
    $conn = $BD->getConexion();
 
    $stmt = $conn->prepare('SELECT * FROM productos WHERE cod = :cod');
    $stmt->execute(array(':cod' => $cod));
    $stmt->setFetchMode(PDO::FETCH_ASSOC);   
    
    $producto = $stmt->fetch();    
    $stmt->closeCursor();

    $BD->cerrarConexion();
    
    return $producto;   
}

function validar_datos($datos) {
    
    $msgerr = array('errNombre' => '', 'errPvp' => '');
    
    if ( $datos['nombre'] == "" )
       $msgerr['errNombre'] = "Debe introducir el nombre del producto";

    if ( $datos['pvp'] == "" )
       $msgerr['errPvp'] = "Debe introducir el precio del producto";

    if ( $datos['nombre'] != "" && $datos['pvp'] != "" ) {
       if ( !is_numeric($datos['pvp']) )
          $msgerr['errPvp'] = 'Precio: <b>'.$datos['pvp'].'</b> Debe ser numérico <br/>';
       if ( !preg_match('/^[a-zñÑáéíóú\d_\s]{1,28}$/i', $datos['nombre']) )
          $msgerr['errNombre'] = 'Nombre: <b>'.$datos['nombre'].'</b> Debe ser alfanumérico <br/>';
    }
    
    return $msgerr;
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

        // Empezar a generar el control 
        $salida = '';
        $salida .= "<select class=\"form-control\" name='selProveedor'><br/>";
        while ( $prov = $stmt->fetch() ) {
            if ( $prov['cif'] == $selec )
                $salida .= "  <option value='" . $prov['cif'] . "' selected=\"selected\" >" . $prov['cif']. " " . 
                                    $prov['nom_emp'] . "</option><br/>"; 
            else    
                $salida .= "  <option value='" . $prov['cif'] . "'>" . $prov['cif']. " " . 
                                    $prov['nom_emp'] . "</option><br/>";
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
function modificar_producto($producto) {

    // Aqui $producto es en realidad el $_POST
    $nombre = $producto['nombre'];
    $precio = $producto['pvp'];
    $proveedor = $producto['selProveedor']; 
    $cod = $producto['cod'];
    
    try { 
        
        $BD = new ConectarBD();   
        $con = $BD->getConexion(); 
        
        $stmt = $con->prepare('UPDATE productos SET '
                . 'nom_prod = :nom_prod, '
                . 'pvp = :pvp, '
                . 'prov = :prov '
                . 'WHERE cod = :cod');
        
        $stmt->execute(array(':nom_prod' => $nombre, ':pvp' => $precio, 
                                ':prov' => $proveedor, ':cod' => $cod));

        $numReg = $stmt->rowCount();
        
        $stmt->closeCursor();
        $BD->cerrarConexion();
        
        return $numReg;

        } catch(PDOException $e) {
           $BD->cerrarConexion(); 
           die ("¡Error!: " . $e->getMessage() . "<br/>");
    }

}  

?>

<!-- Parte cliente del script PHP.

    Presenta un formulario de entrada con el nombre y precio del producto, así
    como un control simple para seleccionar el CIF del proveedor.
    En caso de errores de validación después de pulsar el botón Enviar se 
    mantienen los datos introducidos.
    resenta mensajes de error justo debajo de cada campo del formulario.
     En caso de inserción en BD correcta muestra los datos en forma de tabla. 
-->     

<!DOCTYPE html>

<html>
    <head> 
      <meta charset="utf-8"/>
      <title>Ejercicio 7 Modificar</title>
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
                    <?php echo $_SESSION['usuario']; ?></strong><p> 
                </div>
                <?php echo 'Código:' . $cod; ?>              
                <div id="alta">
                    <form class="form-horizontal" action="" method="post">
                        <input type="hidden" name="cod" value="<?php echo $cod; ?>" /> 
                        
                        <label for="nombre">Nombre:</label>                 
                        <input type="text" class="form-control" name="nombre" id="nombre" 
                                value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre']; else echo $prod['nom_prod']; ?>"  
                                placeholder="Nombre Producto"/>
                        
                        <p class='alert-danger'><?php echo $error['errNombre']; ?></p>
                       
                            <label for="precio">Precio:</label>                    
                            <input type="text" class="form-control" name="pvp" id="precio" 
                                value="<?php if (isset($_POST['pvp'])) echo $_POST['pvp']; else echo $prod['pvp']; ?>"  
                                placeholder="Precio Producto" />
                        
                        <p class='alert-danger'><?php echo $error['errPvp']; ?></p>
                       
                           <label for="proveedor">Proveedor:</label>                 
                           <?php if (isset($_POST['selProveedor']))
                                    echo lista_proveedores($_POST['selProveedor']); 
                                 else echo lista_proveedores($prod['prov']); ?>
                           
                        <figure>
                            <img class="imagen" src="imgProd/<?php echo $prod['imagen']; ?>">
                        </figure>
                                        
                        <div>
                            <button type="submit" class="btn btn-primary" name="Enviar" 
                                    value="Enviar">Modificar</button>
                            <button type="submit" class="btn btn-primary" name="Limpìar" 
                                    value="Limpiar">Limpiar</button>
                        </div>
                         
                    </form>
                    
                    <h4 class='alert-success'><?php echo $operealizada; ?></h4>
                    
                </div>    
            </div>  
            
            <aside>
                <?php include_once 'aside.php'; ?> 
            </aside>
            
        </section>    
          
        <footer>
            <?php include_once 'pie.php'; ?>
        </footer>
    </body>
</html>           