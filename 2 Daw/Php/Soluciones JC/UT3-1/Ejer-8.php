<?php

// Array bidimensional
$credenciales = array(
 'ana' => array('nombre' => 'Ana', 'apellido' => 'García', 'clave' =>
'a4a97ffc170ec7ab32b85b2129c69c50'),
 'marga' => array('nombre' => 'Margarita', 'apellido' => 'Ayuso', 'clave' =>
'35559e8b5732fbd5029bef54aeab7a21'),
 'pepe' => array('nombre' => 'Jose', 'apellido' => 'González', 'clave' =>
'10dea63031376352d413a8e530654b8b'),
 'luis' => array('nombre' => 'Luis', 'apellido' => 'Merino', 'clave' =>
'C707dce7b5a990e349c873268cf5a968')
 );

// Mostrar array. Solamente a efectos de depuración
echo '<h3>Array "credenciales"</h3>';
echo "<pre>", var_dump($credenciales), "</pre>"; 

// Se trata igual que cualquier array. Pero ahora cada elemento es un array
foreach($credenciales as $usuario) {  // $usuario es un array unidimensional
    if ( $usuario['clave'] == md5('clave2') ) 
       echo 'El usuario con contraseña <b>clave2</b> es ' . 
            $usuario['nombre'] . " " . $usuario['apellido'] . '<br/>';  
}

echo "<h3>Comprobación</h3>";

echo "md5('clave2') = " . md5('clave2') . '<br/>';
echo "La clave encriptada en MD5 del usuario pepe es <b>" . 
        $credenciales['pepe']['clave'] . "</b><br/>" ;
echo "COINCIDEN";

