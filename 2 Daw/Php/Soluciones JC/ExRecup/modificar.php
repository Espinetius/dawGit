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
    <title>Modificar</title>
</head>
<body>
    <p>Usuario conectado <span style="font-weight: bold;"><?php echo $_SESSION['usuario']; ?></span>
    <br/>
    <p>Datos del usuario <span style="font-weight: bold;"><?php echo $_GET['usu']; ?></span><br/>
    <br/>
    <a href="index.php">Ir a Inicio</a><br/>
    <a href="consulta.php">Regresear menú anterior</a><br/>
    <a href="cerrarsesion.php">Cerrar Sesión</a>  

</body>
</html>