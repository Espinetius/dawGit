<?php

/* Ejemplo de consultas preparadas y no preparadas. 

    Hay que acostumbrarse a codificar las consultas que involucran parámetros
    de entrada en modo PREPARADO. De esta manera impedimos que se introduzcan
    parámetros de ehtrada que pueden provocar un ataque de inyección SQL y 
    que extraigan información no deseada de nuestra BD.

    En este ejemplo se muestra una consulta que recibe un parámetro en su 
    cláusula WHERE. La cadena de consulta puede ser de la siguiente manera:

     "SELECT * FROM `proveedores WHERE poblacion = ' $pobl '"

    Si introducimos en $pobl el valor  1' OR '1'='1 , la consulta anterior

    dará como resultado  "SELECT * FROM proveedores WHERE poblacion='1' OR '1'='1'"

    resultando siempre cierto y, en consecuencia, mostrando toda la tabla de 
    proveedores.

    Esta situación se evita codificando la consulta en modo PREPARADA. De esta 
    manera, la consulta anterior no devuelve ningún resultado.

*/

    include_once 'claseConexionBD.php';

    function obtener_ProveedoresPobl($pobl)
    {    
        $BD = new ConectarBD();   
        $conn = $BD->getConexion();
        
        echo "Función SIN consulta preparada --> Población introducida: --$pobl--<br/>" ; 
        $sql = "SELECT * FROM proveedores WHERE poblacion = '$pobl'";
        echo "Consulta introducida: $sql";
        
        $stmt = $conn->prepare($sql);
            
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);   
        $proveedores = $stmt->fetchAll();

        $BD->cerrarConexion();
        
        return $proveedores;   
    }
    
    function obtener_ProveedoresPoblPreparada($pobl)
    {   
        $BD = new ConectarBD();   
        $conn = $BD->getConexion();

        // Consulta PREPARADA. Es la forma correcta de realizar consultas que 
        // tienen parámetros. Evitamos ataques de inyección SQL.     
        echo "Función CON consulta preparada --> Población introducida: --$pobl--<br/>" ; 
 
        $sql = 'SELECT * FROM proveedores WHERE poblacion = :poblacion'; 
        echo $sql . '<br/>';
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':poblacion' => $pobl));  
        $stmt->debugDumpParams();

        $proveedores = $stmt->fetchAll();

        $BD->cerrarConexion();
        
        return $proveedores;   
    }
    
    // $listado = obtener_ProveedoresPobl("Alcobendas");
                
    // Consulta NO PREPARADA. Es posible un ataque de inyección SQL. Con el
    // valor de $pobl = 1' OR '1'='1  la consulta devuelve todas las filas 
    // de la tabla proveedores.
    $pobl = "1' OR '1'='1";

    // $listado = obtener_ProveedoresPobl($pobl);  // No preparada
    $listado = obtener_ProveedoresPoblPreparada($pobl);  // Preparada
    
    if ( count($listado) == 0 ) {
        echo "<br/>No hay datos";
        exit;
    }
  
?>
           
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Consultas con PDO</title>
        <link rel='stylesheet' type='text/css' href='css/estilos_2.css' />
    </head>
    <body>
        <h3>Relación de Proveedores</h3>
        
        <table border=1>
           <tr><th>Cif</th><th>Nombre</th><th>Dirección</th><th>Población</th></tr>

           <?php
               
                foreach ( $listado as $proveedor ) {
           ?>
                    <tr>
                        <td><?php echo $proveedor['cif']; ?></td>
                        <td><?php echo $proveedor['nom_emp']; ?></td>
                        <td><?php echo $proveedor['direccion']; ?></td>
                        <td><?php echo $proveedor['poblacion']; ?></td>
                    </tr>
            <?php 
                }
            ?>     
        </table>

        <?php echo 'Número de filas: ' . count($listado); ?>

    </body>
</html>         