 <?php
 
    // Sube a un directorio del servidor web un archivo de tipo imagen 
    // seleccionado desde un formulario HTML. 
    // Cuando desde el formulario se introduce un input type='file', el valor
    // introducido es recogido en PHP mediante el array global $_FILES.
    // El sistema lo sube a un directorio temporal y nosotros tenemos que 
    // moverlo al dirctorio deseado.

 
    if ( isset($_POST['enviar']) ) {
        
       if ( is_uploaded_file($_FILES['foto']['tmp_name']) ) {  // El fichero se ha subido
          $nombreDirectorio = "fotos/";  // Directorio destino donde subir el archivo 
          $nombreFichero = $_FILES['foto']['name'];  // Nombre del archivo
          $tipo = $_FILES['foto']['type'];   // Tipo de archivo
          
          if ($tipo !='image/x-png' && $tipo != 'image/jpeg') // No es una imagen
             $err = "Archivo " . $_FILES['foto']['name'] . " no es una imagen";
          else  // Archivo es una imagen
          {    
            if ( is_dir($nombreDirectorio) ) {  // Es un directorio existente ==> Mover archivo
             //  $idUnico = time();  // Valor único, pues depende del instante de tiempo actual
             //  $nombreFichero = $idUnico."-".$nombreFichero; // El nombre del fichero va a ser único
               $nombreCompleto = $nombreDirectorio.$nombreFichero;  // Ruta archivo + nombre del archivo 
               move_uploaded_file($_FILES['foto']['tmp_name'], $nombreCompleto);
               $err = 'El archivo subido está disponible en <a href="./fotos/'.
                   $nombreFichero.'">'.$nombreFichero.'</a>';
            }
            else 
               $err = 'Directorio definitivo inválido';
          }
       }
       else
          $err = "No se ha podido subir el fichero<br/>";
    }  
?> 

<!DOCTYPE html>
<html>
    <head>
        <title>Ejer-3-4</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
         .rojo { color: red; font-weight: bold; }
    </style>
    </head>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            Seleccionar archivo a subir:
            <input type="file" name="foto" /><br/>
            <input type="submit" name="enviar" value="Subir archivo"/><br/>
        </form> 
        <p class="rojo"><?php if (isset($err)) echo $err; ?></p>
    </body>
</html>