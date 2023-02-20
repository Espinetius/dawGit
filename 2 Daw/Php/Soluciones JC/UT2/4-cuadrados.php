<?php

const N=10;

function cuadrado($num) {
    return $num*$num;
   
    // Tb.  return pow($num, 2);
}
function cubo($num) {
    return $num*$num*$num;
   
    // Tb.  return cuadrado(num)*num;
    // Tb.  return pow($num, 3);
}

echo "n n^2 n^3<br/> ";

for ($i=1; $i<=N; $i++) {
    echo $i, " ", cuadrado($i), " ", cubo($i), '<br/>';
}
?>

<!-- Otra manera. En formato HTML  -->
<html>
    <body>
        <br/>
        <table border="1">
            <tr><th>n</th><th>n^2</th><th>n^3</th></tr> 
            <?php
                for ($i=1; $i<=N; $i++) {
                    echo "<tr><td>$i</td><td>", cuadrado($i), "</td><td>", cubo($i), "</td></tr>";
                }
            ?>
        </table>
    </body>
</html>


