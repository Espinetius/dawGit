<!DOCTYPE html>
<?php
    $pelis = array(
    array('nombre' => 'EL GOLPE', 'director' => 'GEORGE ROY HILL', 'año' => 1973),
    array('nombre' => 'LOS PAJAROS', 'director' => 'CCCALFRED HITCHOCK', 'año' => 1963),
    array('nombre' => 'SOSPECHOSOS HABITUALES', 'director' => 'BRYAN SINGER', 'año' => 1995),
    array('nombre' => 'PIRATAS DEL CARIBE EN EL FIN DEL MUNDO', 'director' => 'GORE BERBINSKI', 'año' => 2007),
    array('nombre' => 'EL SEÑOR DE LOS ANILLOS. LA COMUNIDAD DEL ANILLO', 'director' => 'PETER JACKSON', 'año' => 2001),
    array('nombre' => 'WILLOW', 'director' => 'RON HOWARD', 'año' => 1988),
    array('nombre' => 'LOS PAJAROS', 'director' => 'ALFRED HITCHOCK', 'año' => 1963),    
    array('nombre' => 'BRAVEHEART', 'director' => 'MEL GIBSON', 'año' => 1995),
    array('nombre' => 'LA VENTANA INDISCRETA', 'director' => 'ALFRED HITCHOCK', 'año' => 1954),    
    );
                   
    /* Función que genera una cadena de caracteres que se corresponderá con una
       tabla HTML.	
       La salida es compuesta dinámicamente y creada como un string.
       Este string es el que retornará la función. Y desde el código PHP que se
       se encuentra embebido dentro del código HTML, se invocará simplemente 
       con echo funcion(...,...) para ser interpretada por el navegador web.  
    */	   
    function peliculas($pd, $titulo) {
        
        $salida = "<h3>$titulo</h3>";
        $salida .= '<table>';
        $salida .= '<tr><th>Código</th><th>Nombre</th><th>Director</th><th>Año</th></tr>';
        
        // Recorrido. Versión índices.
        for ($i=0; $i<count($pd); $i++)
        {
           $salida .= '<tr><td>' . $i . '</td>'; 
           $salida .= '<td>' . $pd[$i]["nombre"] . '</td>';
           $salida .= '<td>' . $pd[$i]["director"] . '</td>';
           $salida .= '<td>' . $pd[$i]["año"] . '</td></tr>';  
        }
        $salida .= '</table>';
        
        return $salida;
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 11</title>
        <link rel='stylesheet' type='text/css' href='css/base.css'>
    </head>
    <body> 
        <?php  // Código PHP con la lógica de la aplicación
        
            echo peliculas($pelis, "Películas");

            // Guardar en sendos arrays los valores a ordenar, es decir, todos
            // los valores de cada columna a ordenar.
            foreach ($pelis as $clave => $fila) {
                $nombre[] = $fila['nombre'];
                $director[] = $fila['director'];
            }
            
            // Realizar la ordenación del array multidimensional. Por nombre,
            // ascendentemente y por director descendentemente
            array_multisort($nombre, SORT_DESC, $director, SORT_ASC, $pelis);
            
            echo peliculas($pelis, "Películas ordenadas por 'nombre' desc. y 'director' asc.");
        ?>
           
    </body>
</html>