
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Inserción test_clients</title>
        <link rel='stylesheet' type='text/css' href='css/estilos_2.css' />
    </head>
    <body>
        <div class="contacto">
            <form action="" method="post"">
                <label>Nombre: </label><input type="text" name="nombre" id="name"/>
                <label>Dirección: </label><input type="text" name="direccion" id="address"/><br/>
                <label>Descripción: </label><input type="text" name="descripcion" id="description"/>
                <label>Teléfono: </label><input type="text" name="telf" id="telf"/><br/>
                <label>Tipo: </label><input type="text" name="tipo" id="type"/><br/><br/>
                
                <input type="submit" name="enviar" value="Nuevo Cliente" /><br/><br/> 
            </form>
        </div>  
        
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
              . 'VALUES (0, :name, :address, :description, :tlf, :type)');
    
    try {
        $stmt->execute( array( ':name' => $datos['nombre'],
                               ':address' => $datos['direccion'],
                               ':description' => $datos['descripcion'],
                               ':tlf' => $datos['telf'],
                               ':type' => $datos['tipo'])
                      );
    }
    catch (PDOException $ex) {
        print "¡Error!: " . $ex->getMessage() . "<br/>";
        die();
    }
    $BD->cerrarConexion(); 
}

?>