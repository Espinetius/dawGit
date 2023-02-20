<?php

    // Array en PHP
    $colores = array('azul', 'amarillo', 'rojo', 'verde');
    
    // Los índices son 0, 1, etc.
    echo 'print_r($colores): ', print_r($colores);
    sort($colores);
    echo '<br/>print_r(sort($colores)): ', print_r($colores);

    echo '<br/>$colores[2]: ', $colores[2], '<br/>';
    
    // Recorrido del array
    echo '<b>Recorrido del array mediante bucle for</b><br/>';
    for ($i=0; $i<count($colores); $i++)
       echo $colores[$i], "<br/>";

    // Forma habitual de recorrido del array en PHP
    echo '<b>Recorrido del array mediante bucle foreach</b><br/>';
    foreach($colores as $v)
        echo $v, "<br/>";

    // Array asociativo en PHP. Se compone de pares clave => valor
    $provincias = array('M' => 'Madrid', 'B' => 'Barcelona', 'V' => 'Valencia');
    
    echo 'print_r($provincia): ', print_r($provincias), '<br/>';
    echo 'var_dump($provincia): ', var_dump($provincias), '<br/>';
    
    // Ahora podemos acceder a un elemento del array a través de su clave o etiqueta
    echo '$provincias[\'V\']: ', $provincias['V'], "<br/>";
    
    // Mostrar claves y valores del array asociativo 
    echo '<b>Recorrido del array mostrando claves y valores</b><br/>';
    foreach($provincias as $c => $v)
        echo $c, ":", $v, "<br/>";
    
    
     