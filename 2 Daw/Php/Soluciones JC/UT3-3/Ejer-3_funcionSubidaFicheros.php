 <?php
 
    /* Sube a un directorio del servidor web un archivo de tipo imagen 
       seleccionado desde un formulario HTML. 
       Cuando desde el formulario se introduce un input type='file', el valor
       introducido es recogido en PHP mediante el array global $_FILES.
       El sistema lo sube a un directorio temporal y nosotros tenemos que 
       moverlo al directorio deseado.
	   
	   En realidad este código no es una función. Un buen ejercicio sería 
	   convertir este código en una verdadera función y que así fuera práctica
	   y reutilizable por muchos scripts. 
	   
	   Podría tener como parámetros:
	   
	   1.- Nombre de subcarpeta/subdirectorio donde subir el archivo.
	   2.- Opcionalmente un tipo de archivo, para permitir o no subir el archivo.
	   
	   Y como retorno de la función un string, indicando si todo fue bien o el 
	   mensaje de error si es que lo huebiere.
	*/
		
     
        if ( is_uploaded_file($_FILES['foto']['tmp_name']) ) {  // El fichero se ha subido
          $nombreDirectorio = "img/";  // Directorio destino donde subir el archivo 
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
               $err = 'El archivo subido está disponible en <a href="./img/'.
                   $nombreFichero.'">'.$nombreFichero.'</a>';
            }
            else 
               $err = 'Directorio definitivo inválido';
          }
        }
        else
          $err = "No se ha podido subir el fichero<br/>";
 