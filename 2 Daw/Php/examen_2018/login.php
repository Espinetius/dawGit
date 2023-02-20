<?php

    include_once("claseConexionBD.php");

    session_start();

    if(isset($_SESSION["usuario"]))
    {
        header("Location: aplicacion.php");
    }

    $errorValidacion = "";
    $errorUsuario = "";
    $errorContrasenia = "";

    if(isset($_POST["login"]))
    {
        $usuario = $_POST["usuario"];
        $contrasenia = $_POST["contrasenia"];

        if(empty($usuario))
        {
            $errorUsuario = "Tiene que escribir el usuario";
        }

        if(empty($contrasenia))
        {
            $errorContrasenia = "Tiene que escribir la contrasenia";
        }

        if(!empty($usuario) && !empty($contrasenia))
        {
            $bd = new ConectarBD();
            $base = $bd->getConexion();
    
            $resultado = $base->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND password = :contrasenia");
            $resultado->execute(array("usuario" => $usuario, "contrasenia" => $contrasenia));
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            $filaUsuario = $resultado->fetch();
    
            if($resultado->rowCount() > 0)
            {
                if(!isset($_SESSION["usuario"]))
                {
                    $_SESSION["usuario"] = $usuario;
                    $_SESSION["rol"] = $filaUsuario["rol"];
                }

                header("Location: aplicacion.php");
            }
            else
            {
                $errorValidacion = "Usuario o contraseña incorrecto";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="" method="POST">
        Usuario <input type="text" name="usuario">
        <br><br>
        Contraseña <input type="text" name="contrasenia">
        <br><br>
        <input type="submit" value="Login" name="login">
    </form>
    <p style="color: red;"><?php if(isset($errorValidacion)) echo $errorValidacion ?></p>
    <p style="color: red;"><?php if(isset($errorUsuario)) echo $errorUsuario ?></p>
    <p style="color: red;"><?php if(isset($errorContrasenia)) echo $errorContrasenia ?></p>
</body>
</html>