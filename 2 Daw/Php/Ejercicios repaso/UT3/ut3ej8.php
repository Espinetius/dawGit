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
        $credenciales = array(
            'ana' => array('nombre' => 'Ana', 'apellido' => 'García', 'clave' =>
            'a4a97ffc170ec7ab32b85b2129c69c50'),
            'marga' => array('nombre' => 'Margarita', 'apellido' => 'Ayuso', 'clave' =>'35559e8b5732fbd5029bef54aeab7a21'),
            'pepe' => array('nombre' => 'Jose', 'apellido' => 'González', 'clave' =>'10dea63031376352d413a8e530654b8b'),
            'luis' => array('nombre' => 'Luis', 'apellido' => 'Merino', 'clave' =>
            'C707dce7b5a990e349c873268cf5a968')
            );
        foreach($credenciales as $usuario){
            if($usuario['clave']==md5("clave2")) {
                echo "El usuario es " . $usuario['nombre'] . " " . $usuario['apellido'];
            }
        }
    ?>
</body>
</html>