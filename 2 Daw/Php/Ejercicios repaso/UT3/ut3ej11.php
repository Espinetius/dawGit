<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table, tr, td {
            border:1px solid black;
        }
        
    </style>
    <title>Document</title>
</head>
<body>
    <?php
        $tabla = array(
            array("codigo" =>"1" ,"nombre" => "EL GOLPE", "director" => "GEORGE ROY HILL"),
            array("codigo" =>"2" ,"nombre" => "LOS PAJAROS", "director" => "ALFRED HITCHOCK"),
            array("codigo" =>"3" ,"nombre" => "SOSPECHOSOS HABITUALES", "director" => "BRYAN SINGER"),
            array("codigo" =>"4" ,"nombre" => "PIRATAS DEL CARIBE", "director" => "GORE VERBINSKI"),
            array("codigo" =>"5" ,"nombre" => "EL SEÑOR DE LOS ANILLOS", "director" => "PETER JACKSON"),
            array("codigo" =>"6" ,"nombre" => "WILLOW", "director" => "RON HOWARD"),
            array("codigo" =>"7" ,"nombre" => "BRAVEHEARTH", "director" => "MEL GIBSON") 
        );
        ?>
        <table>
        <tr>
        <td>Codigo</td>
        <td>Nombre</td>
        <td>Director</td>
        </tr>
        <?php
        foreach($tabla as $key => $peliculas) {
            echo '<tr><td>'.$peliculas['codigo'].'</td><td>'.$peliculas['nombre'].'</td><td>'.$peliculas["director"].'</td></tr>';
        };
?>
        </table>
        
  
</body>
</html>