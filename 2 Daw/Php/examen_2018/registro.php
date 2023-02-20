<?php

    include_once("claseConexionBD.php");

    if(isset($_POST["insertar"]))
    {
        $usuario = $_POST["usuario"];
        $contrasenia = $_POST["contrasenia"];
        $email = $_POST["email"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $rol = 0;

        $ejecutado = "";

        $bd = new ConectarBD();
        $base = $bd->getConexion();

        $resultado = $base->prepare("INSERT INTO usuarios VALUES(:usuario, :contrasenia, :email, :nombre, :apellidos, :rol)");
        $resultado->execute(array("usuario" => $usuario, "contrasenia" => $contrasenia, "email" => $email, "nombre" => $nombre, "apellidos" => $apellidos, "rol" => $rol));
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        
        if($resultado->rowCount() > 0)
        {
            $ejecutado = "Se ha insertado";
        }
        else
        {
            $ejecutado = "No se ha insertado";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1>
    <form action="" method="POST">
        Usuario <input type="text" name="usuario">
        <br><br>
        Contraseña <input type="text" name="contrasenia">
        <br><br>
        Email <input type="text" name="email">
        <br><br>
        Nombre <input type="text" name="nombre">
        <br><br>
        Apellidos <input type="text" name="apellidos">
        <br><br>
        <input type="submit" value="Insertar" name="insertar">
    </form>
    <p style="color: red;"><?php if(isset($ejecutado)) echo $ejecutado  ?></p>
</body>
</html>