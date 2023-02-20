<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>tabla 10x10 del 0 al 99</p>
    <?php
    $linea=10;
        for($i=0;$i<10;$i++) {
            for ($j=0;$j<10;$j++) {
                echo $j+($i*$linea);
            }
            echo "</br>";
        }
    ?>
</body>
</html>