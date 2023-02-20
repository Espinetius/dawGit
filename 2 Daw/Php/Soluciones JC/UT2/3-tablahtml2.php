<?php
    const N = 10;
    $num = N*N;  
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3. Tabla HTML</title>
        <link rel="stylesheet" href="css/estilos_2.css">
    </head>    
    <body>
        <h4>Tabla <?php echo N;?> x <?php echo N;?> elementos de enteros entre 0 y <?php echo $num-1; ?>  con estilos inline</h4>
        <table border="1">
            <?php
                for ($i=0; $i<N; $i++) {
                    if ( $i % 2 == 0 ) // Fila par
                       echo '<tr style="background-color:lightblue;">'; 
                    else  // Fila impar
                       echo '<tr style="background-color:lightgreen;">';  
                    
                    for ($j=0; $j<N; $j++) {
                       echo '<td style="text-align:center">', $i*N+$j , "</td>";
                    }   
                    echo '</tr>';              
                }    
            ?>
        </table>
        
        <?php
            echo '<h4>Tabla ', N, 'x', N, ' elementos de enteros entre 0 y ', $num-1, ' con estilos hoja externa</h4>';
        ?>        
        <table border="1">  
             <th colspan="<?php echo N; ?>">Cabecera</th>
             
                <?php 
                for ($i=0; $i<N; $i++) {
                    echo '<tr>';  
                    for ($j=0; $j<N; $j++) {
                       echo '<td style="text-align:center">', $i*N+$j , "</td>";
                    }   
                    echo '</tr>';              
                }    
            ?>
        </table>
        
    </body>
</html>
  
    
    
    

  
