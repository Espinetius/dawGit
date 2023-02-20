<?php
/*
    $cif = 'B0041567J';
    $nombre = 'Toshiba España';
    $dir = 'Carretera Fuencarral, 46';
    $pobl = 'Alcobendas';
*/
    $cif = $_POST['cif'];
    $nombre = $_POST['nombre'];
    $dir = $_POST['dir'];
    $pobl = $_POST['pobl'];

    include_once 'claseConexionBD.php';

    $BD = new ConectarBD();   
    $conn = $BD->getConexion();

    $stmt = $conn->prepare('INSERT INTO proveedores (cif, nom_emp, direccion, poblacion) '
                                    . 'VALUES (:cif2, :nom_emp, :direccion, :poblacion)');    
    try {
        $stmt->execute( array( ':cif2' => $cif,
                               ':nom_emp' => $nombre,
                               ':direccion' => $dir,
                               ':poblacion' => $pobl)
                      );
        
        if ( $stmt->rowCount() > 0 )  // Se ha realizado la inserción
           header('Location: Ejer2_lisProv.php');
          // echo 'Insertadas ' . $stmt->rowCount() . ' filas';
    }
    catch (PDOException $ex) {
        print "¡Error!: " . $ex->getMessage() . "<br/>";
        exit;
    }
    
    $BD->cerrarConexion();    
?>
  
  
