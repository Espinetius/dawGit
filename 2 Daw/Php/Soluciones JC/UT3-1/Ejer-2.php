<?php

    $b = array(1 => "manzana", "0" => "naranja", 2 => "uva", 3 => 'mandarina');
        
    // Genera un array escalar a partir de las claves del array original 
    $claves_b = array_keys($b);
    
    echo '<h3>Array original "b"</h3>';
    print_r($b);  echo '<br/>';
    
    echo '<h3>Array asociativo con las claves del array "b" utilizando array_keys</h3>'; 
    print_r($claves_b);  echo '<br/>';    
    
    
    $paises = array("es" => "España", "fr" => "Francia", "it" => "Italia");

    $claves_paises = array_keys($paises);
    
    echo '<h3>Array "paises"</h3>';
    print_r($paises);  echo '<br/>';
    
    echo '<h3>Array escalar con las claves del array "paises"</h3>';
    print_r($claves_paises);  echo '<br/>';