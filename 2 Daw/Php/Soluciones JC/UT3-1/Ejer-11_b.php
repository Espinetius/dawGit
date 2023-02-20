<!DOCTYPE html>
<?php
    $pelis = array(
        array('codigo' =>1, 'nombre' => 'EL GOLPE', 'director' => 'GEORGE ROY HILL', 'año' => 1973),
        array('codigo' =>2, 'nombre' => 'LOS PAJAROS', 'director' => 'CCCALFRED HITCHOCK', 'año' => 1963),
        array('codigo' =>3, 'nombre' => 'SOSPECHOSOS HABITUALES', 'director' => 'BRYAN SINGER', 'año' => 1985),
        array('codigo' =>4, 'nombre' => 'PIRATAS DEL CARIBE EN EL FIN DEL MUNDO', 'director' => 'GORE BERBINSKI', 'año' => 2007),
        array('codigo' =>5, 'nombre' => 'EL SEÑOR DE LOS ANILLOS. LA COMUNIDAD DEL ANILLO', 'director' => 'PETER JACKSON', 'año' => 2001),
        array('codigo' =>6, 'nombre' => 'WILLOW', 'director' => 'RON HOWARD', 'año' => 1988),
        array('codigo' =>7, 'nombre' => 'LOS PAJAROS', 'director' => 'AAAALFRED HITCHOCK', 'año' => 1963),    
        array('codigo' =>8, 'nombre' => 'BRAVEHEART', 'director' => 'MEL GIBSON', 'año' => 1995),
        array('codigo' =>9, 'nombre' => 'LA VENTANA INDISCRETA', 'director' => 'ALFRED HITCHOCK', 'año' => 1954),    
    );
               
    $pelis2 = array(
        array('codigo' =>1, 'name' => 'EL GOLPE', 'director' => 'GEORGE ROY HILL'),
        array('codigo' =>2, 'name' => 'LOS PAJAROS', 'director' => 'CCCALFRED HITCHOCK'),
        array('codigo' =>3, 'name' => 'SOSPECHOSOS HABITUALES', 'director' => 'BRYAN SINGER')  
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
        $salida .= '<table><tr>';
        
        // Recogemos las etiquetas de una fila cualquiera para mostrarlas
        // en la cabecera de la tabla
        foreach ($pd[0] as $c => $v) 
           $salida .= '<th style="text-transform: capitalize;">' . $c . '</th>';
        
        $salida .= '</tr>';
        
        // Generación de cada fila de la tabla
        foreach ($pd as $pelicula)
        {
           $salida .= '<tr>'; 
           foreach ( $pelicula as $v )  
               $salida .=  '<td>' . $v . '</td>'; 
           $salida .= '</tr>';     
        }   
        $salida .= '</table>';
        
        return $salida;  // 'string' con contenido tabla HTML
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 11_b</title>
        <link rel='stylesheet' type='text/css' href='css/base.css'>
    </head>
    <body> 
        <?php
            
            echo peliculas($pelis, "Películas");

            // Guardar en sendos arrays los valores a ordenar              
            foreach ($pelis as $clave => $fila) {
                $nombre[] = $fila['nombre'];
                $director[] = $fila['director'];
            }
            
            // Realizar la ordenación del array multidimensional
            array_multisort($nombre, SORT_DESC, $director, SORT_ASC, $pelis);
            
            echo peliculas($pelis, "Películas ordenadas por 'nombre' desc. y 'director' asc.");
        ?>
           
    </body>
</html>


