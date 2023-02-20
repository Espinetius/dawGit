<?php

    $cad = "Desarrollo Web en Entorno Servidor con PHP";
    
    echo '<h3>Cadena original</h3>';
    echo $cad;  echo '<br/>';
   
    echo '<h3>Cadena reemplazada ("PHP" por "JSP") con str_replace</h3>';
    // Retorna una cadena cuyo valor es la original modificada
    echo str_replace("PHP", "JSP", $cad);    
       
    $cad = "A ana le gusta la analítica";
    
    echo '<h3>Cadena original</h3>';
    echo $cad;  echo '<br/>';
   
    echo '<h3>Cadena reemplazada ("ana" por "pepita") con str_replace</h3>';
    // Retorna una cadena cuyo valor es la original modificada
    echo str_replace("ana", "pepita", $cad);    
    
   
