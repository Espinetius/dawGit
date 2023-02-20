<?php

/* 
 * Recibe dos parámetros de un formulario vía GET y los muestra. 
 * Hay que utilizar la variable global $_GET o $_REQUEST
 * 
 */

    echo '<h3>Datos recibidos vía GET y recogidos con $_GET</h3>';
    
    print_r($_GET);  echo '<br/>';
    print_r($_REQUEST);  echo '<br/><br/>';
    
    echo "Nombre: <b>" . $_GET['nombre'] . "</b><br/>";
    echo "Apellidos: <b>" . $_GET['apellidos'] . "</b><br/>";

    echo '<h3>Datos recogidos mediante $_REQUEST</h3>';

    echo "Nombre: <b>" . $_REQUEST['nombre'] . "</b><br/>";
    echo "Apellidos: <b>" . $_REQUEST['apellidos'] . "</b><br/>";

?>

