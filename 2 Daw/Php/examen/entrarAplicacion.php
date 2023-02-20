<?php
    include_once("claseConexionBD.php");

    session_start();

    $sesionIniciada = "";

    if(isset($_SESSION["usuario"]))
    {
        $sesionIniciada = "Usuario conectado: " . $_SESSION["usuario"];
    }

    $bd = new ConectarBD();
    $base = $bd->getConexion();

    $resultado = $base->prepare("SELECT * FROM pelis");
    $resultado->execute();
    $resultado->setFetchMode(PDO::FETCH_ASSOC);
    $peliculas = $resultado->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>