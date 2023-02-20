<?php

echo "<h3>Ejercicio nº5</h3>";

$idioma = "en";

echo "El idioma introducido es: $idioma <br/>";

// Instrucción else, else if  
if ( $idioma == "es" )
   echo "Saludo HOLA <br/><br/>";
else if ( $idioma == "en" )
   echo "Saludo HELLO <br/><br/>";
else if ( $idioma == "fr" )
   echo "Saludo BONJOUR <br/><br/>";
else
   echo "Error!!. Idioma no registrado <br/><br/>"; 


// Array asociativo en PHP. Observamos que tiene la estructura 'etiqueta' => 'valor'
$paises = array('es' => "España", 'en' => "Reino Unido", 'fr' => "Francia");
echo $paises['en'] . "<br/";

// Mostrar valores del array
echo "<strong>Recorrido de valores</strong> <br/>";
foreach ($paises as $p) {
    echo "$p <br/>";
}

// Mostrar claves y valores 
echo "<br/><strong>Recorrido de valores y sus claves</strong> <br/>";
foreach ($paises as $c => $p) {
    echo "$c: $p <br/>";
}

echo "<h3>Ejercicio nº6 (utilizando el array asociativo anterior)</h3>";

$idioma = 'es';
$saludos = array('es' => "Hola", 'en' => "Hello", 'fr' => "Bonjour");

echo "idioma introducido: $idioma";
echo "<br/>$saludos[$idioma] $paises[$idioma]";  // Muestra es España


echo "<h3>Añadido al ejercicio. Añadir/sustituir datos a un array</h3>";
// Añaden/sustituyen datos al array $arr
$arr = array("Hola", '3'=>"Sal", "1");  /* Etiqueta [0] con valor "Hola", 
 *  etiqueta [3] con valor "Sal" y etiqueta [1] con valor "1"                                 
 */
print_r($arr);
$arr["curso"] = "DAW";  // Añade dato con etiqueta [curso] y valor "DAW"
$arr["3"] = "segundo";  // Reemplaza el valor "Sal" por "Segundo" de la etiqueta [3]
echo '<br/>';

print_r($arr);


