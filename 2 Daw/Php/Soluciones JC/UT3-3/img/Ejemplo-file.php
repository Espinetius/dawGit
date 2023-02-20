<?php

if ( isset($_POST['enviar']) ) {
    var_dump($_FILES);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ejer-3-4</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
         .rojo { color: red; font-weight: bold; }
    </style>
    </head>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            Seleccionar archivo a subir:
            <input type="file" name="foto" /><br/>
            <input type="submit" name="enviar" value="Subir archivo"/><br/>
        </form> 
        <p class="rojo"><?php if (isset($err)) echo $err; else echo ""; ?></p>
    </body>
</html>

