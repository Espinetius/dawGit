                     
<?php

/* Recibe del cliente tres datos: dos operandos y una operación aritmética.
 * Comprueba que los operandos sean ambos numéricos. En caso de que lo sean, 
 * calcula dicha operación y la muestra.
 */

    $oper1 = $_POST['oper1'];
    $oper2 = $_POST['oper2'];
    $operacion = $_POST['operacion'];

    if ( !is_numeric($oper1) || !is_numeric($oper2) )  
       echo 'Alguno o ambos de los operadores no son numéricos';
    else  // Ambos son numéricos => Calcular operación
    {           
        switch ($operacion) {
            case "+":
                $res = $oper1 + $oper2;
                break;
            case "-":
                $res = $oper1 - $oper2;
                break;
            case "*":
                $res = $oper1 * $oper2;
                break;
            case "/":
                if ( $oper2 != 0 ) // Sólo si divisor no es 0
                    $res = $oper1 / $oper2;
                else
                    $res = 'La división por 0 no está permitida';
                break;
            default:  // Por construcción del formulario, ésto nunca se dará
                echo "Operación no permitida.";
        }
        
        echo $oper1 . " " . $operacion . " " . $oper2 . " = " . $res;       
    }
?>

