<?php

/* 
 * Recibe dos parámetros de un formulario vía POST y los muestra.
 * 
 * Los datos enviados no viajan en la URL, sino en el cuerpo del mensaje.
 * 
 * Se puede utilizar para recoger los datos también la variable global $_REQUEST.
 * 
 */

    echo '<h3>Datos recibidos vía POST y recogidos con $_POST</h3>';

    echo "Nombre: <b>" . $_POST['nombre'] . "</b><br/>";
    echo "Apellidos: <b>" . $_POST['apellidos'] . "</b><br/>";

    echo '<h3>Datos recogidos mediante $_REQUEST</h3>';

    echo "Nombre: <b>" . $_REQUEST['nombre'] . "</b><br/>";
    echo "Apellidos: <b>" . $_REQUEST['apellidos'] . "</b><br/>";

?>

