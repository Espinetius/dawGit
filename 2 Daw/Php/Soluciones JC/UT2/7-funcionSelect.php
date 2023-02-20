<!-- 
   Se trata de construir dinámicamente una SELECT SIMPLE de HTML partiendo
   de un array asociativo PHP, esto es, array de pares clave-valor.
-->
<?php
     
    $paises = array('es' => "España", 'en' => "Reino Unido", 'fr' => "Francia", 
                    'pt' => "Portugal", 'it' => "Italia", 'd' => 'Alemania',
                     'ni' => 'Nicaragüa');

    /* Función que devuelve una cadena de caracteres cuyo valor son el conjunto
     * de OPTIONS de una SELECT simple HTML construido dinámicamente a partir 
     * de un array de pares clave-valor que se introduce como argumento en la 
     * función.  
    */
    
    
    
    function listasimple($arr) {
        $salida = "";  // Valor a retornar con los OPTIONS de la SELECT 
        foreach ($arr as $c => $p) {
            $salida .= "<option value='$c'>$p</option>";
        }
        return $salida;
    }
    
    /* Ampliación de la función anterior en la que se introduce por parámetro
     * el name de la SELECT, así como 'opcionalmente' una de la claves 
     * seleccionadas.  
    */
    function listasimplecompleta($arr, $nombre, $claveselecc="") {
        // Valor a retornar una cadena de caracteres con la SELECT dinámica
        $salida = "<select name='$nombre'>";  
        foreach ( $arr as $c => $p ) {           
            if ( $c == $claveselecc )
               $salida .= "<option value='$c' selected>$p</option>"; 
            else    
               $salida .= "<option value='$c'>$p</option>";
        }
        $salida .= "</select>";
        
        return $salida;
    }
    
    /* Retorna una cadena de caracteres que contiene un elemento radio button
     * generado a partir de un array de datos PHP. Se le proporciona un name
     * al control, así como una posible clave checked por defecto.
    */
    function radiobutton($arr, $nombre, $claveselecc="") {
        // Valor a retornar con el RADIO BUTTON dinámico
        $salida = "";  
        foreach ( $arr as $c => $p ) {           
            if ( $c == $claveselecc )
               $salida .= "<input type='radio' name='$nombre'"
                    . " value='$c' checked>$p</input>"; 
            else    
               $salida .= "<input type='radio' name='$nombre'"
                    . " value='$c'>$p</input>"; 
        }
        return $salida;
    }   
?>

<html>
    <body>
        <h2>Lista simple de países</h2>
        <select name='paises'>
            <?php echo listasimple($paises); ?>
        </select>
        
        <br/>
        <h2>Lista simple de países SIN valor seleccionado</h2>
        <?php echo listasimplecompleta($paises, 'pais'); ?> 
        <br/>
        <h2>Lista simple de países CON valor seleccionado</h2>
        <?php echo listasimplecompleta($paises, 'pais', 'fr'); ?>
        
        <br/>
        <h2>Radio Button de países SIN valor seleccionado</h2>
        <?php echo radiobutton($paises, 'pais'); ?> 
        <br/>
        <h2>Radio Button de países CON valor seleccionado</h2>
        <?php echo radiobutton($paises, 'pais', 'pt'); ?>     
    </body>
</html>    