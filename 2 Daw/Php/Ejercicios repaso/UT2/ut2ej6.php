<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for="">Seleccione idioma</label><br>
    <?php
        $paises = array('es'=> 'hola', 'en' => 'hello', 'fr'=>'bonjour');
    ?>
    <select name="" id="">   
    <?php
        foreach($paises as $key => $saludo){
    ?>
    <option value="">
    <?php
        echo $saludo;
        }
    ?>
    </option>
    </select>
</body>
</html>