<?php
   session_start();
   
   if (!isset($_SESSION['nombre']))
      header('Location: login.php');
   else {
       $nombre = $_SESSION['nombre'];
       $apellidos = $_SESSION['apellidos'];
       
   }
    
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Sesiones</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' type='text/css' href='css/estilos_2.css' />          
    </head>
    <body>
        <?php echo 'Conectado como <b>' . $nombre . ' ' . $apellidos ?>
        <br/><br/>
        <div>
            <form action="" method="post" onsubmit="return validarForm();">           
                <label>Nombre: </label><input type="text" name="nombre" id="nombre" />
                <label>Dirección: </label><input type="text" name="direccion" id="direccion" /><br/>
                <label>Teléfono: </label><input type="text" name="telf" id="telf"/><br/>
                <label>Descripción: </label><input type="text" name="descripcion" id="descripcion" /><br/>
                <label>Tipo: <select name="tipo">
                        <option value="N">Normal</option>
                        <option value="P">Premium</option>
                    </select>
                             
                <br/><br/> 
                <input type="submit" name="enviar" value="Nuevo Cliente" /><br/><br/> 
            </form>
        </div>    
        
        <table>
        <?php
            if ( isset($_POST['enviar']) ) {
                insertar_datos($_POST);
            }
            $clientes = obtener_datos(); 
            if ( count($clientes) > 0 ) {
            ?>    
                <table>
                    <tr><th>Nombre</th><th>Dirección</th><th>Teléfono</th><th>Descripción</th><th>Acciones</th></tr> 
                <?php
                    foreach ( $clientes as $cliente ) {
                        if ( $cliente['type'] == 'P' )
                            echo '<tr style="font-weight: bold">';
                        else
                            echo '<tr>';
                
                        echo "<td>".$cliente['name']."</td><td>".$cliente['address'].
                                    "</td><td>".$cliente['tlf']."</td><td>".$cliente['description']."</td>";
                        echo "<td><a href='detalle.php?id=".$cliente['id']."'>Detalle</a></td>";            
                    
                        echo "</tr>";
                    }
                ?>      
                </table>        
                <br/>
                <?php 
                    echo 'Número de clientes: ' . count($clientes);
            }
            else {
                echo "No hay datos";
            }
        ?>
        <br/><br/>
        <a href="desconectar.php">Cerrar Sesión</a>
        
        <script type="text/javascript" src="js/funciones.js"></script> 
    </body>
</html> 
    

<?php

function obtener_datos() {
    
    include_once 'claseConexionBD.php';

    $BD = new ConectarBD();   
    $conn = $BD->getConexion();
   
    $stmt = $conn->prepare('SELECT * FROM test_clients');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);   
    $stmt->execute();
    $datos = $stmt->fetchAll();
    
    $BD->cerrarConexion();
    
    return $datos;   
}

function insertar_datos($datos) {
    
    include_once 'claseConexionBD.php';

    $BD = new ConectarBD();   
    $conn = $BD->getConexion();
   
    $stmt = $conn->prepare('INSERT INTO clientes (id, name, address, tlf, description, type) '
              . 'VALUES (0, :name, :address, :telf, :descripcion, :tipo)');
    
    try {
        $stmt->execute( array( ':name' => $datos['nname'],
                               ':address' => $datos['address'],
                               ':telf' => $datos['tlf'],
                               ':descripcion' => $datos['description'],
                               ':tipo' => $datos['type'])
                      );
    }
    catch (PDOException $ex) {
        print "¡Error!: " . $ex->getMessage() . "<br/>";
        die();
    }
    $BD->cerrarConexion(); 
}

?>

