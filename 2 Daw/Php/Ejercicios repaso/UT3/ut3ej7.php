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
        $frase = "Desarrollo web en Entorno Servidor con PHP";
        $arrayFrase = explode(" ",$frase);
        $arrayFrase2 = implode("-", $arrayFrase);
        $arrayFrase3 = str_replace("PHP","JSP",$arrayFrase2);
        var_dump($arrayFrase3);
    ?>
</body>
</html>