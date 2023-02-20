<?php
   
    session_start();
   
    if (!isset($_SESSION['nombre']))
       header('Location: login.php');
    else {
       $nombre = $_SESSION['nombre'];
       $apellidos = $_SESSION['apellidos'];
       
    }

    // Recoger lo que llega
    $id = $_GET['id'];
    
    $detalle = obtener_detalle($id);

    function obtener_detalle($id) {
    
        include_once 'claseConexionBD.php';

        $BD = new ConectarBD();   
        $conn = $BD->getConexion();

        $stmt = $conn->prepare('SELECT * FROM test_clients WHERE id = :id');
        $stmt->execute(array(':id' => $id));  
        $detalle = $stmt->fetch(PDO::FETCH_ASSOC);

        $BD->cerrarConexion();

        return $detalle;   
    }
    
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Detalle Registro</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' type='text/css' href='css/estilos_2.css' />          
    </head>
    <body>
        <?php echo 'Conectado como <b>' . $nombre . ' ' . $apellidos ?><br/>
        <h3>Cliente con ID <?php echo $id ?></h3>
        
        Nombre: <?php echo $detalle['name']; ?><br/>
        Dirección: <?php echo $detalle['address']; ?><br/>      
        Teléfono: <?php echo $detalle['tlf']; ?><br/>
        Tipo: <?php echo $detalle['type']; ?><br/><br/><br/>
               
        <a href="javascript:history.go(-1)">Listado Clientes</a><br/>
        <a href="desconectar.php">Cerrar Sesión</a>
    </body>
</html>    