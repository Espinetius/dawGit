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
    <title>Aplicacion</title>
</head>
<body>
    <h1>Aplicacion</h1>
    <p><?php echo $sesionIniciada ?></p>
    <table border=1>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Año</th>
            <th>Caratula</th>
        </tr>
        <?php foreach($peliculas as $v) {  ?>
            <tr>
                <td><?php echo $v["id"] ?></td>
                <td><?php echo $v["nombre"] ?></td>
                <td><?php echo $v["anio"] ?></td>
                <td><a href="detalle_pelicula.php?id=<?php echo $v["id"] ?>&nombre=<?php echo $v["nombre"] ?>&anio=<?php echo $v["anio"] ?>&caratula=<?php echo $v["caratula"] ?>"><img src="./img/<?php echo $v['caratula'] ?>" style="width: 100px; height: 100px"></a></td>
                <td><a href="modificar.php?id=<?php echo $v["id"] ?>&nombre=<?php echo $v["nombre"] ?>&anio=<?php echo $v["anio"] ?>&caratula=<?php echo $v["caratula"] ?>">Modificar</a></td>
                <td><a href="eliminar.php?id=<?php echo $v["id"] ?>&nombre=<?php echo $v["nombre"] ?>&anio=<?php echo $v["anio"] ?>&caratula=<?php echo $v["caratula"] ?>">Eliminar</a></td>
            </tr>
        <?php }  ?>
    </table>
    <p><a href="cerrar_sesion.php"><?php if(isset($_SESSION["usuario"])) echo "Cerrar sesion" ?></a></p>
</body>
</html>