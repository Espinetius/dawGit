<?php
    session_start();

    if (!isset( $_SESSION['usuario'])) {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación</title>
</head>
<body>
    <p>Conectado como <span style="font-weight: bold;"><?php echo $_SESSION['usuario']; ?></span>

    <h1>Aplicación Principal</h1>

    <a href="consulta.php">Consultar</a><br/>
    <a href="index.php">Inicio</a><br/>
    <a href="cerrarsesion.php">Cerrar Sesión</a>  
</body>
</html>