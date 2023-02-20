<?php
    session_start();

    if(!isset($_SESSION["usuario"]))
    {
        header("Location: login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicacion</title>
</head>
<body>
    <h1>Aplicacion</h1>
    <p><?php echo "Bienvenido/a " . $_SESSION["usuario"] ?></p>

    <p><a href="consulta.php">Consulta</a><p>
    <p><a href="inicio.php">Inicio</a><p>
    <p><a href="cerrar_sesion.php">Cerrar sesion</a><p>
</body>
</html>