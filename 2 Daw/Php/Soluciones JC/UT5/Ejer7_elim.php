<?php

    session_start();
    
    if (!isset($_SESSION['usuario']))
        header('Location: Ejer6.php');  

    if ( !isset($_GET['p']) ) {
        echo "Para eliminar un producto se necesita el código";
    }
    else {

        $cod = $_GET['p'];  // Se recibe de la página modificar/eliminar 

        include_once 'claseConexionBD.php';

        $BD = new ConectarBD();   
        $conn = $BD->getConexion();

        $stmt = $conn->prepare('DELETE FROM productos WHERE cod = :cod');
        $stmt->execute(array(':cod' => $cod));

        /*
        if ($stmt->rowCount() > 0)  // Se ha realizado el borrado
           echo 'Eliminadas ' . $stmt->rowCount() . ' filas';
        else 
           echo 'No se pudo realizar la eliminación'; 
        */
        $BD->cerrarConexion();
         
        header('Location: Ejer7_baja.php');
    }
?>