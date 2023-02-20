
<!DOCTYPE html>

<html>
    <head>
        <title>Inserción test_clients</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel='stylesheet' type='text/css' href='css/estilos_2.css' />           
    </head>
    <body>
       <div class="contacto">
            <form action="" method="post" onsubmit="return validarForm();">
                <label>Nombre: </label><input type="text" name="nombre" id="nombre"/>
                <label>Dirección: </label><input type="text" name="direccion" id="direccion"/><br/>
                <label>Descripción: </label><input type="text" name="descripcion" id="descripcion"/>
                <label>Teléfono: </label><input type="text" name="telf" id="telf"/><br/>
                <label>Tipo: </label><input type="text" name="tipo" id="tipo"/><br/><br/>
                
                <input type="submit" name="enviar" value="Nuevo Cliente" /><br/><br/> 
            </form>
        </div>  
        
        </body>

        <?php
            if ( isset($_POST['enviar']) ) {
                insertar_datos($_POST);
            }
            $clientes = obtener_datos(); 
            if ( count($clientes) > 0 ) {
            ?>    
                <table>
                    <tr><th>Nombre</th><th>Dirección</th><th>Teléfono</th><th>Descripción</th></tr> 
                <?php
                    foreach ( $clientes as $cliente ) {
                        if ( $cliente['type'] == 'P' )
                            echo '<tr style="font-weight: bold">';
                        else
                            echo '<tr>';
                
                        echo "<td>".$cliente['name']."</td><td>".$cliente['address'].
                                    "</td><td>".$cliente['tlf']."</td><td>".$cliente['description']."</td>";
                    
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
   
    $stmt = $conn->prepare('INSERT INTO test_clients (id, name, address, description, tlf, type) '
              . 'VALUES (0, :nombre, :direccion, :foto, :telf, :tipo)');
    
    try {
        $stmt->execute( array( ':nombre' => $datos['nombre'],
                               ':direccion' => $datos['direccion'],
                               ':telf' => $datos['telf'],
                               ':foto' => $datos['descripcion'],
                               ':tipo' => $datos['tipo'])
                      );
    }
    catch (PDOException $ex) {
        print "¡Error!: " . $ex->getMessage() . "<br/>";
        die();
    }
    $BD->cerrarConexion(); 
}

?>
