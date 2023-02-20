<?php

    $a = array("manzana", "naranja");
    $b = array(1 => "manzana", "0" => "naranja");
    
    echo "<h2>Arrays originales</h2>";
    
    print_r($a); echo '<br/>';
    print_r($b); echo '<br/>';    
    
    // Añade elementos al final del array
    array_push($a, "uva", "mandarina");
    array_push($b, "uva", "mandarina");    
    
    echo "<h2>Arrays después de añadir los dos elementos con array_push</h2>";
    
    print_r($a); echo '<br/>';
    print_r($b); echo '<br/>';    
    
    // Otra forma de añadir elementos al final del array
    $a[] = "kiwi";  
    $a[] = "plátano";
    
    echo "<h2>Array a después de añadir otros dos elementos con " . '$a[] = "elemento"; </h2>' ;
    
    print_r($a); echo '<br/>';
    
    $frutas = array("pera", "melocotón");
    
    foreach($frutas as $v) {
        $a[] = $v;
    }  
    
    print_r($a); echo '<br/>';
    
    