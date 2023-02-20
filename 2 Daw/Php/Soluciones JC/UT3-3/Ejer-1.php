<?php

/* Función que recorre los archivos de un cierto directorio que se introduce 
 * como parámetrro. 
 * Devuelve un array asociativo con el nombre de los ficheros encontrados.
 */ 

function recorreDir($dir) {
   $archivos = array();
   if (is_dir($dir)) {
      if ($dh = opendir($dir)){
         while (($file = readdir($dh)) !== false) {
             if ( $file != '.' && $file != '..' )
                $archivos[] = $file;
         }
         closedir($dh);
      }
   }
   return $archivos;
}


/* Función equivalente */ 
function recorreDir_2($dir) {
   $archivos = array();
   if (is_dir($dir)) {
      if ($dh = opendir($dir)){
         $file = readdir($dh);
         while ( $file !== false) {
            if ( $file != '.' && $file != '..' )
               $archivos[] = $file;
            $file = readdir($dh);
         }
         closedir($dh);
      }
   }
   return $archivos;
}

// Probar la función
echo "<h3>Relación de archivos imagen de la carpeta 'img'</h3>";
$archivos = recorreDir("img");
     
foreach ($archivos as $v) {
    echo $v . "<br/>";
}
     