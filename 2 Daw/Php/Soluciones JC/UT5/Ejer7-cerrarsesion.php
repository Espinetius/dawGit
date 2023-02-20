<?php

    /* Cerrar sesión. Para cerrar la sesión, primeramente hay que comprobar
       si hay establecida una o no. No se puede destruir una sesión inexistente.
       De ahí el poner session_start();
    */

    session_start();

    $_SESSION = array();  // Eliminar los datos de sesión

    session_destroy();  // Destruir la sesión existente

    header('Location: Ejer6.php');  // Redirigir al principio (Login)

?>    

