<?php

    // Recogida de datos del formulario
    $cif = $_POST['cif'];
    $nombre = $_POST['nombre'];
    $dir = $_POST['dir'];
    $pobl = $_POST['pobl'];

    include_once 'claseConexionBD.php';

    $BD = new ConectarBD();   
    $conn = $BD->getConexion();

    try {
        $stmt = $conn->prepare('UPDATE proveedores SET 
                                       nom_emp = :empresa,
                                       direccion = :direccion,
                                       poblacion = :poblacion
                                WHERE cif = :cif');

        $stmt->execute(array(':empresa' => $nombre,
                             ':direccion' => $dir,  
                             ':poblacion' => $pobl,
                             ':cif' => $cif));
    }
    catch (PDOException $ex) {
        print "¡Error!: " . $ex->getMessage() . "<br/>";
        exit;
    }
    
    $BD->cerrarConexion();

    if ($stmt->rowCount() > 0)  // Se ha realizado la modificación
       header('Location: Ejer2_lisProv.php');
      // echo 'Modificadas ' . $stmt->rowCount() . ' filas';
    else 
       echo 'No se pudo realizar la modificación'; 
?>