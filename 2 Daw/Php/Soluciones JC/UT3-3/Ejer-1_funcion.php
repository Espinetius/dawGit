<?php

/* Función que recorre los archivos de un cierto directorio que se introduce 
 * como parámetro. Devuelve un array con todos los archivos existentes.
 */ 

function recorreDir($dir) {
   $archivos = array();   // Inicializar array
   
   if (is_dir($dir)) {  // Analizar solo si el parámetro es un directorio
       if ($dh = opendir($dir)) {   // Abrir directorio
           while (($file = readdir($dh)) !== false) {  // Recorrer directorio
               if ( $file != '.' && $file != '..' ) // Descartar directorio actual y padre
                   $archivos[] = $file;  // Añadir nombre al array
           }
           closedir($dh);
       }
   }

   return $archivos;
}
     
   