<?php
    $provincias = array('Vi' => 'Alava', 'Ba' => 'Badajoz', 
                          'M'=> 'Madrid', 'V' => 'Valencia',
                        'Za' => 'Zamora');

    $colores = array('0' => 'Azul', '1' => 'Rojo', 
                        '3'=> 'Verde', '4' => 'Amarillo',
                      '5' => 'Gris');                    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>9-SelectSimple</title>
</head>
<body>
        <select name='prov'>
          <?php
               
               foreach($provincias as $c => $p) {
                   if ($c == 'M')
                      echo "<option value='$c' selected>$p</option>";
                   else
                     echo "<option value='$c'>$p</option>";
               }
          ?>
        </select>

        <select name='color'>
          <?php
               
               foreach($colores as $c => $p) {
                   echo "<option value='$c'>$p</option>";
               }
          ?>
        </select>  
</body>
</html>