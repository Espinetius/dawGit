                             <?php 

// Inicializar variables que no son del formulario y sí se utilizan en él.

$error = isset($error) ? $error : '';
 
if ( isset($_POST['enviar']) ) {
    
   $nombre = $_POST['nombre'];
   $apellidos = $_POST['apellidos'];
   $nif = $_POST['nif'];  
   $telefono = $_POST['telefono'];  
   $fechanacimiento = $_POST['fechanacimiento'];
   $email = $_POST['email'];
   
   // Comprobar que se han introducido todos los campos. Tb. vale $nombre=='', etc. 
   if ( empty($nombre) || empty($telefono) || empty($apellidos) || empty($nif) || 
        empty($fechanacimiento) || empty($email) )   {  
      $error = "¡¡ Se debe rellenar <b>todos</b> los campos !!";
   }
   else // Introducidos ==> Validación
   {                      
      $p_tlf = "/^[0-9]{9}$/"; // Teléfono válido
      $p_nif = "/^[0-9]{8}[a-zA-Z]$/"; // NIF válido. No se valida letra. 
      $p_fecha = "/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$/";  // Fecha válida
      $p_cad = "/^[a-zA-Zá-úñÑü\s]*$/"; // La cadena sólo puede contener letras y espacios
      
      // Vamos concatenando los diferentes mensajes de error en una única variable.
      $error = '';
      if (!preg_match($p_cad, $nombre)) {
         $error .= "<br/>Nombre no válido.";
      }
      if (!preg_match($p_cad, $apellidos)) {
         $error .=  "<br/>Apellidos no válidos.";
      }
      if (!preg_match($p_tlf, $telefono)) {
         $error .= "<br/>Teléfono no válido.";
      }
      if (!preg_match($p_nif, $nif)) {
         $error .= "<br/>Nif no válido.";
      }
      if (!preg_match($p_fecha, $fechanacimiento)) {
         $error .= "<br/>Fecha nacimiento no válida.";
      }
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $error .= "<br/>Correo electrónico no válido.";   
      } 
      if ( $error == '' )
         $error = 'La validación ha sido correcta'; 
      
   }   
}

?>

<html>
    <head>
       <title>Ejer-5</title>
       <meta charset='UTF-8'>
       <link rel="stylesheet" href="css/estilos3.css" type="text/css" />  
    </head>
    <body>
        <h2>Validación de datos</h2> 
        <!-- Generamos el formulario, se va a recargar por eso el action es blanco -->
        <div> 
            <form action="" method="post">
                Nombre   : <input name="nombre" type="text" value="<?php if (isset($nombre)) echo $nombre; else echo ''; ?>"><br />
                Apellidos: <input name="apellidos" type="text" value="<?php if (isset($apellidos)) echo $apellidos; else echo ''; ?>"><br />   
                Nif      : <input name="nif" type="text" value="<?php if (isset($nif)) echo $nif; else echo ''; ?>"><br />  
                Teléfono: <input name="telefono" type="text" value="<?php if (isset($telefono)) echo $telefono; else echo ''?>"><br /> 
                Fecha Nacimiento  : <input name="fechanacimiento" type="text" 
                                      placeholder="dd/mm/aaaa" value="<?php if (isset($fechanacimiento)) echo $fechanacimiento; else ''; ?>"><br />      
                Correo Electrónico: <input name="email" type="text" value="<?php if (isset($email)) echo $email; else echo ''; ?>"><br/><br/>    

                <input type="submit" id="enviar" name="enviar" value="Entrar">
            </form>
            <p style="color: red; font-weight: bold;"><?php echo $error; ?></p>
        </div>
    </body>
</html>






