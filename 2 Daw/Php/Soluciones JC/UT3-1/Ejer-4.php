<?php

    $b = array("MA" => "manzana", "NA" => "naranja", "UV" => "uva", 7 => 'mandarina');
    
    // Obtención de un array numérico cuyos valores son las claves del array $b  
    $claves_numericas = array_values($b);
       
    echo '<h3>Array "b"</h3>';
    echo '<pre>', print_r($b), '</pre>';  
    
    echo '<h3>Array numérico o escalar obtenido mediante "array_values"</h3>';
    echo '<pre>', print_r($claves_numericas), '</pre>';      
    
