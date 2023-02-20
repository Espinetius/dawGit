<!DOCTYPE html>
    <head> 
        <meta charset="utf-8"/>
        <title>Ejer-3 login</title>
    </head> 
    <body> 
        
        <h3>Login</h3>            
        <form action="" method="post">          
            <label>Usuario: </label><input type="text" name="usuario"  
               value="<?php if (isset($_POST['usuario'])) echo $_POST['usuario']; else echo ''; ?>"/>         
            <br/>  

            <label>Contraseña: </label><input type="password" name="clave"  
               value="<?php if (isset($_POST['clave'])) echo $_POST['clave']; else echo ''; ?>"/>  

            <br/><br/>
            <input type="submit" name="Enviar" value="Entrar">
        </form>    
        
    </body> 
</html>

<?php   
  
    // Función que comprueba si vienen a blanco o no todos los elementos del
    // array introducido como parámetro.
    // Devuelve una cadena de caracteres vacía o con un mensaje informativo.
    function comprobar_datos($datos) {
       
        $mensaje = array("usuario" => "", "clave" => "");   // Alberga mensajes de introducción de datos
       
        if ( empty($datos['usuario']) )         
           $mensaje["usuario"] = "Debe introducir el usuario <br/>";
       
        if ( empty($datos['clave']) )
           $mensaje["clave"] = "Debe introducir la contraseña <br/>";
       
        return $mensaje;
    }

    // Función que comprueba si el par usuario/clave introducidos como parámetro
    // existen o no en una array asociativo de usuarios. 
    // Retorna verdadero o no, respectivamente. 
    function comprobar_credenciales($usuario, $clave) {

        include_once 'config.inc.php';
       
        $enc = false;
        foreach ($credenciales as $usu => $vclave) {
            if ( $usuario == $usu  &&  md5($clave) == $vclave ) {
               $enc = true; 
               break;
            }           
        }
      
        return $enc;
    }

    
    if ( isset($_POST['Enviar']) ) { // Se pulsó el botón enviar ==> Validación

        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];

        $hay_datos = comprobar_datos($_POST);

        if ( empty($hay_datos["usuario"]) && empty($hay_datos["clave"]) ) {  // Se han introducido los datos

           if ( comprobar_credenciales($usuario, $clave) ) // Permitir ir a la aplicación 
              header('Location: Ejer-4-Bienvenida.php');
           else  
              echo '<p style="color: red; font-weight:bold">Usuario/contraseña no válidos</p>';
        }
        else
           echo '<p style="color: red; font-weight:bold">' . 
                    $hay_datos["usuario"] . '<br/>' . $hay_datos["clave"] . '</p>';
    } 
?>
