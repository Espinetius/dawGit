<?php

// Inicializar variables que se utilicen en el formulario
$nombre = ''; 
$apellidos = '';
$nif = '';
$telefono = ''; 
$fechanacimiento = '';
$email = '';

$error = '';  // Alberga errores de validación
$errorFich = ''; // Alberga errores de subida del fichero
$validacionOK = false;

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
      $error = "<h3>Se debe rellenar <b>todos</b> los campos.</a></h3>";
   }
   else // Se han introducido todos los campos. Validar formatos.
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
      if ( $error == '' ) {  // No hay errores de validación
         $error = 'La validación ha sido correcta'; 
         $validacionOK = true;
      }
      
   }  // Fin comprobación introducción de datos 

   // Validación de datos correcta ==> subir foto
   if ( $validacionOK == true ) {
      
      if ( is_uploaded_file($_FILES['foto']['tmp_name']) ) {
         $nombreDirectorio = "fotos/";
         $nombreFichero = $_FILES['foto']['name'];
         $tipo = $_FILES['foto']['type'];
         if ($tipo !='image/x-png' && $tipo != 'image/jpeg') // no es una imagen
            $errorFich = 'Archivo seleccionado no es una imagen';
         else
            if ($_FILES['foto']['size'] > 100000) 
               $errorFich = 'Archivo seleccionado supera los 100Kb de tamaño';
            else // Archivo válido a subir   
            {    
               $nombreCompleto = $nombreDirectorio.$nombreFichero;
               if (is_dir($nombreDirectorio)) {  // es un directorio existente
              //  $idUnico = time();
              //  $nombreFichero = $idUnico."-".$nombreFichero;
                  $nombreCompleto = $nombreDirectorio.$nombreFichero;
                  move_uploaded_file ($_FILES['foto']['tmp_name'], $nombreCompleto);
                  $errorFich = 'El archivo subido está disponible en <a href="./' . 
                           $nombreCompleto .'">'.$nombreFichero.'</a>';
            }
            else 
               $errorFich = 'Directorio definitivo inválido';
        }
      }
      else
          $errorFich = "No se ha podido subir el fichero<br/>";
  }  
}    

?>

<html>
    <head>
       <title>Ejer-6</title>
       <meta charset='UTF-8'>
       <link rel="stylesheet" href="css/estilos3.css" type="text/css" />  
    </head>
    <body>
        <h2>Validación de datos</h2> 
        <!-- Generamos el formulario, se va a recargar por eso el action es blanco -->
        <div> 
            <form action="" method="post" enctype="multipart/form-data">
                Nombre   : <input name="nombre" type="text" value="<?php echo $nombre; ?>"><br />
                Apellidos: <input name="apellidos" type="text" value="<?php echo $apellidos; ?>"><br />   
                Nif      : <input name="nif" type="text"  placeholder="8 dígitos y una letra"  
                                             value="<?php echo $nif; ?>"><br />  
                Teléfono : <input name="telefono" type="text" value="<?php echo $telefono; ?>"><br /> 
                Fecha Nacimiento  : <input name="fechanacimiento" type="text"
                                       placeholder="dd/mm/aaaa"  value="<?php echo $fechanacimiento; ?>"><br />      
                Correo Electrónico: <input name="email" type="text" value="<?php echo $email; ?>"><br/><br/>    
                Fotografía: <input class="archivo" type="file" name="foto" /><br/><br/>

                <input type="submit" id="enviar" name="enviar" value="Entrar">
            </form>
            <p style="color: red; font-weight: bold;"><?php echo $error; ?></p>
            <p style="color: red; font-weight: bold;"><?php echo $errorFich; ?></p>
        </div>
    </body>
</html>