<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            $nombre = $_POST["nombre"];
            
            echo '<br/><u>Salida con print_r($_POST)</u><br/>';
            
            print_r($_POST);  // Todos los datos se reciben en un array asociativo.
                              // Este array es una variables global $_POST
            
            echo '<br/><br/><u>Salida con var_dump($_POST)</u><br/>';
            
            var_dump($_POST);
               
            echo '<br/><br/>El nombre es:<strong>' . $nombre . '</strong><br/><br/>';
            
            // Sin embargo, los datos provenientes de un <input FILE ... se 
            // recogen mediante la variable $_FILES, que también es un array
            // asociativo multidimensaional que contiene metadatos del fichero, 
            // tales como el nombre, tipo de archivo o tamaño en bytes.
            echo '<br/><br/><u>Salida de la variable global $_FILES</u><br/>';
            var_dump($_FILES);
            
            echo '<br/><br/>Nombre fichero:<strong>' . $_FILES['fichero']['name'] . '</strong>';
            
        ?>
    </body>
</html>
