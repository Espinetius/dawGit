<?php

include 'List_fich.php';

if (isset($_POST['enviar'])) {

    $fich = $_POST['fich'];
     
    // Sanear entrada  
    $fich = htmlspecialchars($_POST['fich']);
    
  //   Código que no valida los datos de entrada  
    if (empty($fich))
       echo "Debe introducir nombre fichero";
    else
    {
      //  $fich = htmlspecialchars($_POST['fich']);
        $dir = "./" . $fich;
        echo "<h4>Listado directorio " . $dir . "</h4>";
        $archivos = recorreDir($dir);

        foreach ($archivos as $v)
           echo $v . "<br/>"; 
    }
      
}    
?>


