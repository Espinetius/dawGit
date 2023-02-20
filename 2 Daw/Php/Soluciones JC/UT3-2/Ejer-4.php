
<?php

    /* Recibe de un formulario un importe y un tipo de moneda que será € o $.
     * 
     * Según el factor de conversión vigente entre ambas monedas, realizará la 
     * transformación.
    */

    $importe = $_POST['importe'];
    $moneda = $_POST['moneda'];
    
    $factor = 1.20;  // 1€ = 1.20$ a octubre de 2021
    $monedas = array('euro' => 'euros', 'dolar' => 'dólares');

    if ( is_numeric($importe) && $importe >= 0 ) {
    
        echo "Convertir $importe $monedas[$moneda] a ";

        // Si la moneda recibida está en euros, convertir a dólares.
        if ( $moneda ==  'euro' ) {
           echo 'dólares  ==> ';
           $res = $importe * $factor;
           echo $res . " dólares";
           echo $res . $monedas['dolar'];
        }
        // Si la moneda recibida está en dólares, convertir a euros.
        else {
           echo 'euros  ==> ';
           $res = $importe / $factor;
           echo $res . " euros";
           echo $res . $monedas['euro'];
        }  
    }
    else {
        echo "Importe introducido <strong>$importe</strong> no es numérico o es negativo.<br/>";    
    }
    
    echo "<br/><a href='Ejer-4.html'>Introducir otro importe</a>";
    
?>
        
   