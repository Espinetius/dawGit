<?php

$alumnos = array ( 1 => "ALMAZÁN GONZÁLEZ GAIZKA",
                   "ÁLVAREZ GABRIEL MARIO",
                   "ASENSIO PALOMO IVÁN",
                   "CANALES SÁNCHEZ MARIO",
                   "CERRADA MARTÍNEZ LUIS ÁNGEL",
                   "FRANCU TIBERIU",
                   "HIDALGO SÁNCHEZ MIGUEL ÁNGEL",
                   "MACÍA GARCÍA IVÁN",
                   "MARÍA RECASENS DANIEL",
                   "MARINA VIEIRA ADRIAN",
                   "MONTORO RIVERA MARTA",
                   "MUÑOZ ALONSO EDUARDO",
                   "PALOMINO SÁNCHEZ DIEGO",
                   "PINA DA SILVA SERGIO",
                   "PORTERO MOLINA MARIO",
                   "RÍO TURRIÓN ALEJANDRO DEL",
                   "SANZ DE DIEGO CRISTINA",
                   "SOLANO GONZÁLEZ JORGE",
                   "TEJERA DE LA TORRE SERGIO",
                   "TELEGARU ALEX TIBERIU",
                   "TENKOUL GONZÁLEZ SAMIR",
                   "VILLANUEVA GARCÍA JOAQUÍN"
                 );

$num_alu = count($alumnos);

for($i=1; $i<=$num_alu; $i++)
   echo $i . "- " . $alumnos[$i] . "<br/>";

echo "<br>Número de alumnos: <b>$num_alu</b><br/><br/>";

$dele = rand(1,$num_alu);
$subdele = rand(1,$num_alu);

echo "Delegado: $dele => <b>$alumnos[$dele]</b><br/><br/>"; 
echo "Subdelegado: $subdele => $alumnos[$subdele]<br/>"; 