<?php
    /*
         $paises = array('es' => "España", 'en' => "Reino Unido", 'fr' => "Francia", 
    'pt' => "Portugal", 'it' => "Italia", 'd' => 'Alemania',
    'ni' => 'Nicaragüa'); 
    */

     include_once 'paises.php';
     
     var_dump($_REQUEST);
     echo "<br/>";

     $pais = $_REQUEST['paises'];
     echo "Valor recibido de la primera Select: $pais<br/>";
     $espania = $paises[$pais];
     echo "El primer país seleccionado es: <b>$espania</b> <br/>";
     $pais1 = $_REQUEST['pais1'];
     echo "Valor recibido de la primera Select: $pais1<br/>";
     $espania = $paises[$pais1];
     echo "El segundo país seleccionado es: <b>$espania</b> <br/>";
?>