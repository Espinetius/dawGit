<?php
    $cad = "Desarrollo Web en Entorno Servidor con PHP";
     
    // Crea un array $arr con las palabras de la cadena $cad
    $arr = explode(" ", $cad);
    
    echo '<h3>Cadena original</h3>';
    echo $cad;  echo '<br/>';
    
    echo '<h3>Array escalar obtenido con "explode" a partir de la cadena original</h3>';
    echo '<h3>El delimitador es el espacio en blanco. Elimina los espacios en el array de salida</h3>';
    echo '<pre>', print_r($arr), '</pre>';   
    
    // Crea un array $arr a partir de $cad con delimitador "or"
    $arr = explode("or", $cad);
    echo '<h3>Array escalar obtenido con "explode" cuando el delimitador en la cadena es "or"</h3>';
    echo '<h3>El delimitador es "or". Elimina las ocurrencias "or" en el array de salida</h3>';
    echo '<pre>', print_r($arr), '</pre>'; 
    
    
