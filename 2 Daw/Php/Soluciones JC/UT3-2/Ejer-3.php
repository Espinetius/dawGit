<?php

/* Recibe del cliente una nota de calificación. 
 * 
 * Solamente se realiza la acción si la nota recibida fue introducida y
 * además es numérica.
 */

    $nota = $_POST['nota'];
    
    echo "Nota recibida: $nota <br/>";
    
    if ( !empty($nota )) {  // Se introdujo un valor en la nota
        if ( is_numeric($nota) ) {  // El valor introducido es numérico

            if ( $nota < 0 )
                echo "La nota debe ser mayor o igual a 0";
            else if ($nota < 5)
                echo "SUSPENSO";
            else if ($nota < 6)
                echo "APROBADO";
            else if ($nota < 7)
                echo "BIEN";
            else if ($nota < 8.5)
                echo "NOTABLE";
            else if ($nota <= 10 )
                echo "SOBRESALIENTE";
            else 
                echo "La nota debe ser menor o igual que 10"; 
            echo "</b>"; 
        }
        else 
            echo "La nota debe ser numérica<br/>";
    }   
    else {
         echo "La nota es obligatoria<br/>";
    }
    echo "<br/><a href='Ejer-3.html'>Regresar al formulario</a>";
    
?>
