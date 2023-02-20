<?php

/* Recibe de un formulario HTML un usuario y una contraseña.
 * Comprueba si dichos datos están o no en un array de credenciales. 
 * En este ejercicio, la parte cliente (HTML) y la parte servidor (PHP) se 
 * encuentran en el mismo archivo.
 * Por tanto, en este script PHP, hay dos funcionalidades: presentación y 
 * lógica de negocio. 
 */

// La función isset($var) devuelve TRUE si $var existe y es distinta de NULL 
// Para el caso siguiente, o no se pulsó el botón de 'Enviar' o no tenía 'name'

// Al estar la parte PHP compuesta solamente por una sentencia "if", se 
// ejecutará única y exclusivamente cuando se haya pulsado el botón "Enviar". 
// Por tanto veremos, mientras tanto, únicamente en el navegador web el
// formulario HTML.    

if ( isset($_POST['Enviar']) ) {  
    // Recoger datos del formulario
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    
    // Comprobar si se han introducido cada uno de los datos. El mensaje de error
    // correspondiente se visualizará en la página HTML.
    if ( empty($usuario) ) 
       $errorUsu = "Debe introducir usuario";   
    if ( empty($clave) ) 
       $errorClave = "Debe introducir contraseña";   
    
    // Este "if" sólo se ejecuta si han introducido tanto el usuario como la contraseña
    if ( !empty($usuario) && !empty($clave) ) { // Comprobar si el usuario es válido o no 
        $valido = comprobar_credenciales($usuario, $clave); 
        
        if ( $valido == true ) { // Usuario correcto. Ir directamente a la 
                                 // aplicación (otra página).  
           header('Location:Ejer-6-OK.php'); 
        }	
        else { // Crear mensaje de error y mantenerse en la página 
           $error = "Par usuario/contraseña no válidos";  	
        }
    } 

}
/* Comprueba si un usuario y una contraseña existen en un array de credenciales.
 * Retorna verdadero o falso.
*/
function comprobar_credenciales($pUsuario, $pClave) {

    // Las contraseñas son clave1, clave2, clave3 y clave4, respectivamente.
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

<!DOCTYPE html>

<!-- Parte HTML del script. Muestra el formulario. 

    Si es la primera vez que se entra en él, todos los campos y mensajes de error
    estarán a blanco. Las siguientes veces recargará la página con el valor(es)
    previo(s) introducido(s), gracias al código PHP embebido en los "value".

    Con los mensajes de error, ocurre lo mismo. Estos mensajes son variables PHP
    que pueden ser mostradas en la página HTML y, además, en el lugar que 
    queramos. Se rellenan según la lógica de la aplicación en la parte de PHP.

    Nota: HTML ==> introducción de datos y presentación de información.
          PHP ==> lógica de negocio: validaciones, cálculos, procesamiento, etc. 
-->

<html>
    <head>
        <title>Ejercicio 6 de formularios ampliado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h3>Login</h3> 
        <!-- Se utiliza PHP en los "value" de los input para que no se pierdan
             los valores introducidos al recargar la página web -->
        <form action="" method="post">          
            <label>Usuario: </label><input type="text" name="usuario" 
                     value="<?php if (isset($_POST['usuario'])) echo $_POST['usuario']; ?>"/>
             <?php if (isset($errorUsu)) echo $errorUsu; ?>
            <br/>  
            <label>Contraseña: </label><input type="password" name="clave" 
                     value="<?php if (isset($_POST['clave'])) echo $_POST['clave']; ?>"/>
             <?php if (isset($errorClave)) echo $errorClave; ?>
            <br/><br/>  
            <input type="submit" name="Enviar" value="Entrar">
        </form> 
        <br/>   
        <!-- Muestra el código de error en el caso de que lo hubiera -->
        <?php if (isset($error)) echo $error; ?>
    </body>
</html>
