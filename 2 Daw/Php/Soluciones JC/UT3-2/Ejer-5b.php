<?php

// También vale if ( $_POST ) 
// if ( $_POST ) {
if (isset($_POST['Enviar'])) {  // Se ha pulsado del botón 
  
    // La primera vez que entramos en el navegador, esto no se ejecuta porque
    // el botón no ha sido pulsado y, en consecuancia, $_POST está vacío.
    print_r($_POST); 
    
    $btnpulsado = "Has pulsado el botón"; // Si vemos este mensaje, es que se 
                                          // ha pulsado el botón.
    
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    
    /* Mensajes de error que aparecen cuando se ha pulsado el botón y además
     * no se han introducido los campos
     */
    if (empty($usuario)) 
       $errUsu = "Debe introducir usuario"; 
    else
       $errUsu = ''; 
      
    if (empty($clave)) 
       $errClave = "Debe introducir contraseña"; 
    else
       $errClave = ''; 
    
    if ( !empty($usuario) &&  !empty($clave) ) {
        // Aquí iría la comprobación de credenciales
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
    </head>
    <body>
        <h3>Login</h3> 
        <form action="" method="post">          
            <label>Usuario: </label><input type="text" name="usuario"/>
            <br/>  
            <label>Contraseña: </label><input type="password" name="clave" />
            <br/><br/>  
            <input type="submit" name="Enviar" value="Entrar">
        </form> 
        <br/>  
        <p>No se ve ningún texto aquí debajo hasta que no hayamos pulsado el botón</p>
        <?php if (isset($btnpulsado)) echo "btnpulsado: $btnpulsado <br/>"; ?>
        <?php if (isset($errUsu)) echo "errUsu: $errUsu <br/>"; ?>
        <?php if (isset($errClave)) echo "errClave: $errClave <br/>"; ?>
    </body>
</html>


