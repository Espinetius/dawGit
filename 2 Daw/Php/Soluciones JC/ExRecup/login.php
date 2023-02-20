<?php
    session_start();

    $error = "";

    if ( isset($_POST['enviar']) ) {

        $fila = validar_credenciales($_POST['usuario'], $_POST['clave']);
       
        if ( $fila == 0 ) 
            $error = "El usuario o la contraseña no son válidos";
        else
        {   
           $_SESSION['usuario'] = $fila['usuario'];
           $_SESSION['rol'] = $fila['rol'];

           header('Location: aplicacion.php');
        }   

    }


    function validar_credenciales($usuario, $clave) {

        include_once 'claseConexionBD.php';
        
        try { 
            
            $BD = new ConectarBD();   
            $conn = $BD->getConexion();
       
            $stmt = $conn->prepare("select * from usuarios WHERE usuario = :usr AND password = :pass");
            $stmt->execute(array(':usr' => $usuario, ':pass' => $clave));
    
            $rows = $stmt->fetch();   
            $stmt->closeCursor();
            $BD->cerrarConexion();
            
            return $rows;
    
        } catch(PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            exit;
        }
        
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        Usuario: <input type="text" name="usuario" required /><br/>
        Contraseña: <input type="password" name="clave" required /><br/>
        <input type="submit" value="Enviar" name="enviar" />
    </form>
    <br/>
    <p><?php echo $error; ?></p>
</body>
</html>