<?php

    $cif = 'B0041567J';
    $nombre = 'Toshiba España';
    $dir = 'Carretera Fuencarral, 46';
    $pobl = 'Alcobendas';

    include_once 'claseConexionBD.php';

    $BD = new ConectarBD();   
    $conn = $BD->getConexion();
    
    $insertadas = 0;

    try {

        $stmt = $conn->prepare('INSERT INTO proveedores (cif, nom_emp, direccion, poblacion) '
              . 'VALUES (:cif, :nom_emp, :direccion, :poblacion)');
                 
        $conn->beginTransaction();
        
        $stmt->execute( array( ':cif' => $cif,
                               ':nom_emp' => $nombre,
                               ':direccion' => $dir,
                               ':poblacion' => $pobl));
        
        $insertadas++;
        
        $conn->commit();  // Consolida en la BD esta fila insertada
        
        $conn->beginTransaction();   // Para dos operaciones de inserción
          
        $stmt->execute( array( ':cif' => "B00415672",
                               ':nom_emp' => 'Toshiba España',
                               ':direccion' => 'Carretera Fuencarral, 46',
                               ':poblacion' => 'Alcobendas'));
       
        $stmt->execute( array( ':cif' => "B00415672",
                               ':nom_emp' => 'Toshiba España',
                               ':direccion' => 'Carretera Fuencarral, 46',
                               ':poblacion' => 'Alcobendas'));       
        $insertadas +=2;
        
        $conn->commit();  // Consolida en la BD estas dos filas insertadas
        
        if ($insertadas > 0)  // Se ha realizado alguna inserción
            echo 'Insertadas ' . $insertadas . ' filas';
        
    }
    catch (PDOException $ex) {
        $conn->rollBack();
        echo "¡Error!: " . $ex->getMessage() . "<br/>";
        echo 'Insertadas ' . $insertadas . ' filas';
        exit;
    }
    
    $BD->cerrarConexion();

?>
  
  
