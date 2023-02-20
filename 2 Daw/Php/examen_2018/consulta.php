<?php

    session_start();

    include_once("claseConexionBD.php");

    $bd = new ConectarBD();
    $base = $bd->getConexion();

    $resultado = $base->prepare("SELECT * FROM usuarios");
    $resultado->execute();
    $resultado->setFetchMode(PDO::FETCH_ASSOC);
    $usuarios = $resultado->fetchAll();

    $bd->cerrarConexion();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
   <h1>Consulta</h1> 
   <p><?php echo "Conectado como " . $_SESSION["usuario"]  ?></p>

   <table border=1>
        <tr>
            <th>Usuario</th>
            <th>Email</th>
            <th>Nombre</th>
            <th>Apellidos</th>
        </tr>
        <?php foreach($usuarios as $v) {  ?>
            <tr>
                <td><?php echo $v["usuario"] ?></td>
                <td><?php echo $v["email"] ?></td>
                <td><?php echo $v["nombre"] ?></td>
                <td><?php echo $v["apellidos"] ?></td>
                <?php if($_SESSION["rol"] != 0) { ?>
                <td><a href="modificar.php">Modificar</a></td>
                <td><a href="eliminar.php">Eliminar</a></td>
                <?php } ?>
            </tr>

        <?php } ?>
   </table>

   <p><a href="aplicacion.php">Regresar menú anterior</a></p>
   <p><a href="cerrar_sesion.php">Cerrar sesión</a></p>
</body>
</html>