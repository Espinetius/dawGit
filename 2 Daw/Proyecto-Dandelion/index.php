<?php
    include("conexionBDD.php");
    session_start();
    $errorUser = "";
    $errorPass = "";
    $errorGeneral = "";
    if (isset($_POST['enviar'])) {
        $usuario = $_POST['user'];
        $password = $_POST['pass'];
        if (empty($usuario)) {
            $errorUser="Tiene que escribir su usuario <br>";
        }
        if (empty($password)) {
            $errorPass = "Tiene que escribir su contraseña <br>";
        }
        if(!empty($usuario) && !empty($password)) {
            try {
            $bd = new ConectarBD();
            $basededatos = $bd -> getConexion();
            $consulta = $basededatos -> prepare("SELECT * FROM usuarios WHERE users = :usuario AND pass = :pass");
            $consulta -> execute(array('usuario' => $usuario, 'pass' => $password));
            $consulta -> setFetchMode(PDO::FETCH_ASSOC);
            $userEncontrado = $consulta -> fetch();
            if($userEncontrado>0) {
                if (!isset($_SESSION['user'])) {
                    $_SESSION['user'] = $usuario;
                }
                header("Location: principal.php");
            } else {
                $errorGeneral = "Usuario o password no validos";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css.css">
    <title>Dandelion Homepage</title>
</head>

<body>
    <header>
        <h1>Dandelion</h1>
    </header>
    <div>
        <fieldset class="login">
            <legend>Login</legend>
            <form action="" method="post">
                <label for="user">Usuario</label><br>
                <input type="text" name="user" placeholder="Introduce tu usuario"><br>
                <label for="pass">Password</label><br>
                <input type="password" name="pass" placeholder="Introduce tu contraseña"><br><br><br>
                <input type="submit" name="enviar"></input>
            </form>
            <p>No estas registrado aún?<br>
                <a href="registro.php">Haz click aqui</a>
            </p>
        </fieldset>
    </div>
    <div class="errores">
        <p><?php if(isset($errorGeneral)) echo $errorGeneral ?></p> 
        <p><?php if(isset($errorUser)) echo $errorUser ?></p> 
       <p><?php if(isset($errorPass)) echo $errorPass ?></p>
    </div>
</body>

</html>