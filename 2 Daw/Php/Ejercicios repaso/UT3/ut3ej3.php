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
        $a = array("manzana", "naranja");
        $b = array(1=> 'manzana', "0" => "naranja");
        $a[] = "uva";
        $a[] = 'mandarina';
        $b[2] = 'uva';
        $b["3"] = 'mandarina';
        ksort($b);
        var_dump($b);
        asort($b);
        var_dump($b);
    ?>
</body>
</html>