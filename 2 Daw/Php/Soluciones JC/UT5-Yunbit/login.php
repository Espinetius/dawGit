<?php

session_start();

// Declarar e inicializar campos que se usan en el formulario HTML. Esto evita
// que salgan Warnings al ejecutar esta página.
$usuario ='';
$clave ='';
$errorUsu='';
$errorCont='';
$errorTodos='';

// Cuerpo principal del código servidor. Se ejecuta únicamente cuando se ha 
// pulsado el botón "entrar".
if ( isset($_POST['entrar']) ) { 
   $usuario = $_POST['usuario'];
   $clave = $_POST['clave']; 
   
   // Limpiar códigos de error de posibles ejecuciones anteriores.
   $errorUsu='';
   $errorCont='';
   $errorTodos='';
    
   if ( $usuario == '' ) {
      $errorUsu= 'Debe introducir el usuario <br>'; 
   }
   if ( $clave == '' ) {
      $errorCont= 'Debe introducir la contraseña <br>'; 
   }
	
   if ( $errorUsu == '' &&  $errorCont == '' ) {
        $fila = verificar_usuario($usuario, $clave);  // Comprobar en BD datos introduciodos        
        if ( $sinError != -1 ) { // Se encontraron los datos -> crear variables de sesión  
           $_SESSION['nombre'] = $fila['nombre'];
           $_SESSION['apellidos'] = $fila['apellidos'];  
           header('Location: Ejer5.php');
        } 
        else // No se encontraron los datos en la BD
           $errorTodos= 'Usuario/Contraseña no válidos <br/>';  
   }  

}

// Comprobar si el usuario/contraseña existen en la BD. Devuelve -1 si no existe 
// o el valor del rol si es que existen.
function verificar_usuario($usuario, $clave) {

    include_once 'claseConexionBD.php';
       
    $BD = new ConectarBD();   
    $conn = $BD->getConexion();
              
    $stmt = $conn->prepare('SELECT * FROM autorizados WHERE usuario=:usuario and contrasenia=:clave');
 
    $stmt->bindValue(':usuario', $usuario); 
    $stmt->bindValue(':clave', $clave); 
    
    //Definimos el modo de asociciación del resultado de la consulta y ejecutamos
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    // Notar que no hay bucle while. Esto es porque el usuario es la clave primaria 
    // de la tabla. Por tanto, o existe una fila como máximo o ninguna.
    $fila = $stmt->fetch();
      
    $stmt->closeCursor();
    $BD->cerrarConexion();
      
    return $fila; 
} 

?>

<!-- Parte cliente del script. Notar que todo lo que se muestra en pantalla está 
     aquí. No hay ningún "echo" en la parte servidor. 
     Se estarán mostrando errores hasta que se introduzcan los datos pedidos y que 
     éstos cumplan ambas validaciones. 
-->
<html>
<head><meta charset="UTF-8"><title>Login</title></head>
<body>
   <h1>Login</h1>
   <form action="" method="POST">
	      <label>Usuario: <input type="text" name="usuario" value="<?php echo $usuario; ?>"></label><br/>
	      <label>Contraseña: <input type="password" name="clave" value="<?php echo $clave; ?>"></label><br/>
         
         <!-- Errores de validación PHP -->
         <span style="color:red;"><?php echo $errorUsu; ?>
	                               <?php echo $errorCont; ?>
                                  <?php echo $errorTodos; ?>
         </span>	
	      <br/>
	      <input type="submit" name="entrar" value="Entrar">
   </form>    
</body>
</html>
