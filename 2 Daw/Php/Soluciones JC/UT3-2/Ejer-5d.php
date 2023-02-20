<?php

if (isset($_POST['Enviar'])) {
    if (empty($_POST['usuario']))
       $errUsu = "Debe introducir usuario";
    if (empty($_POST['clave']))
       $errClave = "Debe introducir contraseña";
    
    if (!empty($_POST['usuario']) && !empty($_POST['clave'])) {
       $valido = comprobar_credenciales ($_POST['usuario'], $_POST['clave']); 
       if (!$valido)
          $errCred = "Par usuario/contraseña no válidos";
       else
           header('Location:Ejer-5-OK.php');
    }   
}

/* Comprueba si un usuario y una contraseña existen en un array de credenciales.
 * Retorna verdadero o falso.
*/
function comprobar_credenciales($pUsuario, $pClave) {

    $credenciales = array(
        'ana' => array('nombre' => 'Ana', 'apell' => 'García', 'clave' => 'a4a97ffc170ec7ab32b85b2129c69c50'),
        'jose' => array('nombre' => 'Jose', 'apell' => 'González', 'clave' => '10dea63031376352d413a8e530654b8b'),
        'marga' => array('nombre' => 'Margarita', 'apell' => 'Ayuso', 'clave' => '35559e8b5732fbd5029bef54aeab7a21'),
        'anton' => array('nombre' => 'Antonio', 'apell' => 'Merino', 'clave' => 'C707dce7b5a990e349c873268cf5a968')
    );
       
    $enc = false;
    foreach ( $credenciales as $cUsu => $datosUsu ) {
        if ( $pUsuario == $cUsu && md5($pClave) == $datosUsu['clave'] ) {
           $enc = true; 
           break;
        }           
    }
      
    return $enc;  
}

?>


<html>
    <head>
        <title>Ejercicio 5 de formularios</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .rojo { color: red; font-weight: bold;}
        </style>
    </head>
    <body>
        <h3>Login</h3> 
        <form action="" method="post">          
            <label>Usuario: </label><input type="text" name="usuario"
                value='<?php if (isset($_POST['usuario'])) echo $_POST['usuario']; else echo ""; ?>'  />
            <span class="rojo"><?php if (isset($errUsu)) echo $errUsu; else echo ""; ?></span>
            <br/>  
            <label>Contraseña: </label><input type="password" name="clave" 
                value='<?php if (isset($_POST['clave'])) echo $_POST['clave']; else echo ""; ?>'  />
            <span class="rojo"><?php if (isset($errClave)) echo $errClave; else echo ""; ?></span>
            
            <br/><br/>  
            <input type="submit" name="Enviar" value="Entrar">
        </form> 
        <br/>  
       <span class="rojo"><?php if (isset($errCred)) echo $errCred; else echo ""; ?></span>
    </body>
</html>

