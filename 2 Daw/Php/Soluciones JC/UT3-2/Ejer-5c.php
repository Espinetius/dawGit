<?php

if (isset($_POST['Enviar'])) {
    $error = "Has pulsado el botón";
    
    $usuario = $_POST['usuario'];
    if (empty($usuario)) 
       $errUsu = "Debe introducir usuario"; 
    else
       $errUsu = ''; 
      
    $clave = $_POST['clave'];
    if (empty($clave)) 
       $errClave = "Debe introducir contraseña"; 
    else
       $errClave = ''; 
    
    if ( empty($errUsu) &&  empty($errClave) ) {
        // Comprobar credenciales
        $mensaje = "Usuario y contraseña introducidos";
    }
    else
        $mensaje = '';
}    

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Ejercicio 5 de formularios</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .rojo { color:red; font-weight: bold; } 
        </style>
    </head>
    <body>
        <h3>Login</h3> 
        <form action="" method="post">          
            <label>Usuario: </label><input type="text" name="usuario"/>
            <span class="rojo"><?php if ( isset($errUsu)) echo $errUsu; else echo ''; ?></span>
            <br/>  
            <label>Contraseña: </label><input type="password" name="clave" />
             <span class="rojo"><?php if ( isset($errClave)) echo $errClave; else echo ''; ?></span>
            <br/><br/>  
            <input type="submit" name="Enviar" value="Entrar">
        </form> 
        
        <?php if ( isset($error)) echo $error; else echo ''; ?>
        <?php if ( isset($mensaje)) echo $mensaje; else echo ''; ?>
        
        <br/>      
    </body>
</html>


