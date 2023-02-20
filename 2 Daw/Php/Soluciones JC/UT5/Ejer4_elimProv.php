<?php

    $cif = $_GET['cif'];  // Llega a través de enlace del listado  

    include_once 'claseConexionBD.php';

    $BD = new ConectarBD();   
    $conn = $BD->getConexion();

    try {
        $stmt = $conn->prepare('DELETE FROM proveedores WHERE cif = :cif');
        $stmt->execute(array(':cif' => $cif));
    }
    catch (PDOException $ex) {
        print "¡Error!: " . $ex->getMessage() . "<br/>";
        exit;
    }
    
    $BD->cerrarConexion();

    if ($stmt->rowCount() > 0)  // Se ha realizado el borrado
        header('location:Ejer2_lisProv.php');
     //  echo 'Eliminadas ' . $stmt->rowCount() . ' filas';
    else 
       echo 'No se pudo realizar la eliminación'; 
?>