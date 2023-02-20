<?php

    // Muestra una tabla HTML 10x10 con los enteros del 0 al 99  
    
    const N = 10;
    $num = N*N;  
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 2. Tabla HTML</title>
    </head>    
    <body>
        <table border="1">
            <?php
                echo '<h4>Tabla ', N, 'x', N, ' elementos de enteros entre 0 y ', $num-1, '</h4>';
                
                for ($i=0; $i<N; $i++) {
                    echo '<tr>';
                    for ($j=0; $j<N; $j++) {
                       echo "<td>", $i*N+$j , "</td>";
                    }   
                    echo '</tr>';              
                }    
            ?>
        </table>
         
    </body>
</html>
  
    
    
    

  
