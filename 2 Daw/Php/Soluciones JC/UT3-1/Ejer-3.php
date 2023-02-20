<?php

    $b = array(1 => "manzana", "0" => "naranja", 2 => "uva", 3 => 'mandarina');
    $c = array("m" => "manzana", "n" => "naranja", "u" => "uva", "ma" => 'mandarina');       
    
    echo '<h3>Array $b</h3>';
    print_r($b);  echo '<br/>';
       
    echo '<h3>Array $b ordenado desc. por clave. krsort</h3>';
    krsort($b);
    print_r($b);  echo '<br/>';    
    
    echo '<h3>Array $b ordenado asc. por valor. Se reordenan las claves. sort</h3>'; 
    sort($b);
    print_r($b);  echo '<br/>';  
    
    echo '<h3>Array $c</h3>';
    print_r($c);  echo '<br/>';
    
    echo '<h3>Array $c ordenado asc. por valor. Se reordenan las claves. sort</h3>';
    sort($c);
    print_r($c);  echo '<br/>';  
    
    $d = array("PE" => "pera", "NA" => "naranja", "UV" => "uva", 'MA' => 'manzana');
    
    echo '<h3>Array $d</h3>';
    print_r($d);  echo '<br/>';
    
    echo '<h3>Array $d ordenado asc. por clave. ksort</h3>';
    ksort($d);
    print_r($d);  echo '<br/>';  
    
    echo '<h3>Array $d ordenado asc. por valor. Se reordenan las claves. sort</h3>';
    print_r($d);  echo '<br/>'; 
    krsort($d);
    print_r($d);  echo '<br/>';
    rsort($d);
    print_r($d);  echo '<br/>';  