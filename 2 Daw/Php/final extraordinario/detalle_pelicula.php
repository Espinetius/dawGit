<?php
    session_start();

    $sesionIniciada = "";
    
    if(isset($_SESSION["usuario"]))
    {
        $sesionIniciada = "Usuario conectado: " . $_SESSION["usuario"];
    }

    $id = $_GET["id"];
    $nombre = $_GET["nombre"];
    $anio = $_GET["anio"];
    $caratula = $_GET["caratula"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos pelicula</title>
</head>
<body>
    <h1>Datos pelicula</h1>
    <p><?php echo $sesionIniciada  ?></p>

    <strong>Datos pelicula</strong>

    <p><?php echo $id ?></p>
    <p><?php echo $nombre ?></p>
    <p><?php echo $anio ?></p>
    <p><?php echo $caratula ?></p>
    <p><img src="./img/<?php echo $caratula ?>"></p>

    <p><a href="aplicacion.php">Volver a la aplicacion</a></p>
    <p><a href="inicio.php">Inicio</a></p>
    <p><a href="cerrar_sesion.php"><?php if(isset($_SESSION["usuario"])) echo "Cerrar sesion" ?></a></p>
</body>
</html>