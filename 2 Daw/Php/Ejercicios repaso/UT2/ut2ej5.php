<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $paises = array('es'=> 'España', 'en'=> 'Ingles', 'fr'=>'Francia');
        foreach($paises as $key=>$pais){
            echo $key . $pais . '&nbsp';
        }
    ?>
</body>
</html>