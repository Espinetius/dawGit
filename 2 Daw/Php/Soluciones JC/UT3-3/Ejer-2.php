<?php
    include_once 'Ejer-1_funcion.php';  // Incluye función para recorrer un directorio
    
    $dir = "img";  // Directorio a recorrer. En este caso es una ruta relativa,
                   // que cuelga del directorio actual.
    
    $archivos = recorreDir($dir);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ejer-2</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>    
        <!-- Mostrar nombres e imágenes en formato tabla HTML -->
        <table border="1">
            <caption><h2>Imágenes de la carpeta <i><?php echo $dir; ?></h2></caption>  
            <th>Nombre</th><th>Imagen</th>
            <?php
                foreach ($archivos as $v) {
            ?>    
                    <tr>
                        <td><?php echo $v; ?></td> 
                        <td><img src="<?php echo $dir . '/' . $v; ?>"
                                 width="90px" height="75px"
                                 alt='Imagen no encontrada'></td>
                    </tr>
                <?php
                }
                ?>
        </table>     
    </body>
</html>
     

