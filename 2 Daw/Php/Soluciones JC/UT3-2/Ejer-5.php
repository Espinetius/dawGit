<?php

/* Recibe de un formulario HTML un usuario y una contraseña.
 * Comprueba si dichos datos están o no en un array de credenciales. 
*/

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$valido = comprobar_credenciales($usuario, $clave); 

// La función header redirecciona automáticamente al usuario sin intervención de
// éste a la página que se indique en Location: 
if ( $valido == true ) {   
   header('Location:Ejer-5-OK.php'); 
}	
else {
   header('Location:Ejer-5-NOOK.php'); 	
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
    foreach ( $credenciales as $usu => $datosusu ) {
        if ( $pUsuario == $usu  && md5($pClave) == $datosusu['clave'] ) {
           $enc = true; // Encontrado. No seguir buscando.
           break;
        }           
    }
      
    return $enc;
}

