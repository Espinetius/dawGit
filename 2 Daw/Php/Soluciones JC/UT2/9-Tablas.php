<?php      
    // Array bidimensional 
    $usuarios = array(
         array("usuario" => "ana", "pass" => "1", "rol" => "admin"),
         array("usuario" => "jose", "pass" => "2", "rol" => "limitado"),
         array("usuario" => "mar", "pass" => "3", "rol" => "limitado"),
         array("usuario" => "david", "pass" => "4", "rol" => "admin")
         );

    echo "<b>Volcado de usuarios</b><br/>";     
    var_dump($usuarios);
     
    echo "<br/><b>Listado con foreach</b><br/>";
     
    foreach($usuarios as $usu) {
        var_dump($usu); // Cada elemento del array es, a su vez, un array
        echo "<br/>"; 
    }
    $usu = $usuarios[1]['usuario'];
    echo "Contraseña del usuario $usu es:  "; 
    echo $usuarios[1]['pass']; // Elemento individual del array
    
    $uno = array("usuario" => "juan", "pass" => "5", "rol" => "admin");
    $dos = array("usuario" => "isabel", "pass" => "6", "rol" => "limitado");
    $tres = array("usuario" => "pedro", "pass" => "7", "rol" => "limitado");
    $cuatro =  array("usuario" => "julia", "pass" => "8", "rol" => "admin");
    
    $masusuarios = array($uno, $dos, $tres, $cuatro);

    array_push($usuarios, $uno, $dos, $tres, $cuatro);
 
    // Función que crea una tabla HTML con los usuarios de un array asociativo 
    function mostrar_usuarios($arr) {
        
        $sal = "";
        
        // Crear cabecera de la tabla
        $sal .= "<table><tr>";
        foreach ($arr[0] as $c => $v ) 
            $sal .= "<th>$c</th>";
        $sal .= "</tr>";
              
        // Crear filas de la tabla
        foreach($arr as $usu) {
            $sal .= "<tr>"; 
            foreach($usu as $u) 
                $sal .= "<td>$u</td>";
            $sal .= "</tr>";
        }
       
        $sal .= "</table>";
       
        return $sal;
    }    
?>

<!DOCTYPE html>

<!-- Muestra en formato tabla HTML los datos de un array bidimensional -->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' type='text/css' href='css/estilos_2.css'>
    </head>
    <body>        
        <?php  echo mostrar_usuarios($usuarios); ?>
        <?php  echo mostrar_usuarios($masusuarios); ?>
    </body>
</html>
