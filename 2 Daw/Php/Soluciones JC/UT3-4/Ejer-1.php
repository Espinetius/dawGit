<?php

/* Funciones para generar controloes a partir de datos que vienen como parámetro.
 * Dado que HTML es sólo texto y que el servidor web genera HTML, se creará
 * una variable textual y en ella se irá almacenando la salida deseada. 
 * Esto será lo que al final retornará la función.
 */

$listpais = "";

// Comprobación de las funciones. Datos de la lista
$paises = array("España", "Francia", "Portugal", "Italia", "Alemania");

if ( isset($_POST['enviar']) ) {
    $listpais = $_POST['listpais'];
}


// Genera una lista HTML no ordenada a partir de unos datos
function listar($datos) {
    $salida = "<ul>";    // Inicializar
    
    foreach($datos as $v) {
        $salida .= "<li>" . $v . "</li>";  // Acumular (concatenar)
    }
    $salida .= "</ul>";
    
    return $salida;
}

// Genera una select simple HTML a partir de unos datos
function selectsimple($datos) {
    $salida = "<select name=\"listpais2\">";     // Inicializar
    
    foreach($datos as $v) {
        $salida .= "<option value=\"$v\">$v</option>";  // Acumular (concatenar)
    }
    $salida .= "</select>";
    
    return $salida;
}

// Genera una select simple HTML a partir de unos datos, marcando un valor
// seleccionado de antemano
function selectsimplechecked($datos, $seleccionado) {
    $salida = "<select name=\"listpais\">";    // Inicializar
    
    foreach($datos as $v) {
        if ( $v == $seleccionado )  // Opción selected para el valor $seleccionado
            $salida .= "<option value=\"$v\" selected=\"selected\">$v</option>";   
        else    
            $salida .= "<option value=\"$v\">$v</option>";  
    }
    $salida .= "</select>";
    
    return $salida;
}

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Listar contenido directorio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h3>Ejemplo sencillo de generación dinámica</h3>
        <h4>Listado de paises</h4>
        <?php echo listar($paises); // Tb. valdría $lis = listar($paises);  echo $lis; ?>
        <form action="" method="post">
            Seleccione un país: <?php echo selectsimple($paises); ?> <br/>
            <pre><b>
                 En el siguiente select veremos que al recargar la página queda 
                 seleccionado el valor previamente elegido</b> 
            </pre>
            Seleccione un país: <?php echo selectsimplechecked($paises, $listpais); ?> <br/><br/>
            <input type="submit" name="enviar" value="Enviar"/>
        </form>
    </body>
</html>