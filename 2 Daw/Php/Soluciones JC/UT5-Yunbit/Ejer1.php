<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Consulta test_clients</title>
        <link rel='stylesheet' type='text/css' href='css/estilos_2.css' />
    </head>
    <body>
        <h3>Relación de Clientes</h3>
        <?php 
            $clientes = obtener_datos();
            if ( count($clientes) > 0 ) {
        ?>        
                <table>
                    <tr><th>Name</th><th>Address</th><th>Telephone</th></tr>
                    <?php
                        foreach ( $clientes as $cliente ) {
                            echo "<tr>";
                            echo "<td>".$cliente['name']."</td><td>".$cliente['address'].
                                "</td><td>".$cliente['tlf'];
                            echo "</tr>";
                    }
                    ?>
                </table>
                <?php
                    echo 'Número de filas: ' . count($clientes); 
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

?>




