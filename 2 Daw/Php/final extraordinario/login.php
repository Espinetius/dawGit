<?php
    include_once("usuarios.php");

    session_start();

    $errorValidacion = "";

    if(isset($_POST["entrar"]))
    {
        $usuario = $_POST["usuario"];
        $contrasenia = $_POST["contrasenia"];
        $encontrado = false;

        foreach($credenciales as $v)
        {
            if($v["usuario"] == $usuario && $v["clave"] == $contrasenia)
            {
                $encontrado = true;
            }
        }

        if($encontrado)
        {
            $_SESSION["usuario"] = $usuario;

            header("Location: aplicacion.php");
        }
        else
        {
            $errorValidacion = "Usuario o contraseña incorrecto";
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
        Usuario
        <select name="usuario">
            <?php foreach($credenciales as $v) {?>
                <option><?php echo $v["usuario"] ?></option>
            <?php }?>
        </select>
        <br><br>
        Contraseña
        <select name="contrasenia">
            <?php foreach($credenciales as $v) {?>
                <option><?php echo $v["clave"] ?></option>
            <?php }?>
        </select>
        <br><br>
        <input type="submit" value="Entrar" name="entrar">
    </form>
    <p style="color: red;"><?php if(isset($errorValidacion)) echo $errorValidacion  ?></p>
</body>
</html>