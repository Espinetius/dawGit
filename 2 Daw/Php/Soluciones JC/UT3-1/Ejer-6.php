<?php

    $cad = "Desarrollo Web en Entorno Servidor con PHP";
    
    // Genera un array con las palabras de la cadena. Para ello, Utiliza como 
    // delimitador los espacios en blanco
    $arr = explode(" ", $cad);
    
    echo '<h3>Cadena original</h3>';
    echo $cad;  echo '<br/>';
    
    echo '<h3>Array obtenido con "explode" a partir de la cadena original</h3>';
    echo '<pre>' , print_r($arr), '</pre>';    
    
    echo '<h3>Cadena obtenida con "implode" a partir del array anterior con delimitador "-"</h3>';
    echo implode("-", $arr);    
    
    echo '<h3>Cadena obtenida con "implode" a partir del array anterior con delimitador "/"</h3>';
    echo implode("/", $arr);    
    
