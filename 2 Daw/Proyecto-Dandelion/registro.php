<?php
    include("conexionBDD.php");
    session_start();
    $errorUser = "";
    $errorMail = "";
    $error = "";
    if (isset($_POST['enviar'])) {
        $usuario=$_POST['usser'];
        $password= $_POST['pas'];
        $nombre= $_POST['nombre'];
        $apellidos= $_POST['apellidos'];
        $mail= $_POST['mail'];
        if(empty($usuario) || empty($password) || empty($nombre) || empty($apellidos) || empty($mail)) {
            $error = "Rellene todos los campos";
        } else {
            try {
            $bd = new ConectarBD();
            $basededatos = $bd -> getConexion();
            $consulta1 = $basededatos -> prepare("SELECT * FROM usuarios WHERE users = :usuario");
            $consulta2 = $basededatos -> prepare("SELECT * FROM usuarios WHERE mail = :mail");
            $consulta1 -> execute(array('usuario' => $usuario));
            $consulta2 -> execute(array('mail' => $mail));
            $consulta1 -> setFetchMode(PDO::FETCH_ASSOC);
            $consulta2 -> setFetchMode(PDO::FETCH_ASSOC);
            $userEncontrado = $consulta1 -> fetch();
            $mailEncontrado = $consulta2 -> fetch();
            if($userEncontrado>0) {
                $errorUser = "Ese usuario ya existe, intente con otro nombre de usuario <br>";
            }
            if($mailEncontrado>0) {
                $errorMail = "Ese correo electronico ya esta registrado. <br>";
            }
            if ($mailEncontrado<=0 && $userEncontrado<=0) {
                
                $crearUsuarioNuevo = $basededatos -> prepare("INSERT INTO usuarios VALUES (:nombre, :apellidos, :usuario, :pass, :mail)");
                $crearUsuarioNuevo->execute([':nombre' => $nombre, 
                                                ':apellidos' => $apellidos,
                                                ':usuario' => $usuario,
                                                ':pass' => $password,
                                                ':mail' => $password]);
                header("Location: index.php");
                

            }
        }catch (PDOException $e) {
            print "Error!" . $e -> getMessage();
            exit;
        }
        }
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./src/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <header>
        <h1>Dandelion</h1>
    </header>
    <div>
        <fieldset class="register">
            <legend>Registro</legend>
            <p style="text-align: center;">Bienvenido! <br> Introduce tus datos</p>
            <form action="" method="post">
                <label for="usser">Usuario</label>
                <input type="text" name="usser" placeholder="Introduce tu usuario"><br>
                <label for="pas">Password</label>
                <input type="password" name="pas" placeholder="Introduce tu contraseña"><br>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" placeholder="Introduce tu nombre"><br>
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" placeholder="Introduce tus apellidos"><br>
                <label for="mail">Correo electronico</label>
                <input type="email" name="mail" placeholder="Introduce tu correo electronico"><br><br>
                <input type="submit" name="enviar" value="Registrar"></input>
            </form>
            <p><a href="index.php">Volver</a></p>
        </fieldset>
    </div>
    <div class="errores">
        <p><?php if(isset($error)) echo $error ?><br></p> 
        <p><?php if(isset($errorUser)) echo $errorUser ?><br></p>
        <p><?php if(isset($errorMail)) echo $errorMail ?></p> 

    </div>
</body>

</html>

</html>