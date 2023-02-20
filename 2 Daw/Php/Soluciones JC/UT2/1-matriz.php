<?php

// Muestra una matriz 10x10 con los enteros del 0 al 99
/* Aquí hay que tener en cuenta que PHP no concatena espacios en blanco.
 * Para imprimir más de un espacio en blanco seguido, podemos hacer uso
 * del espacio en HTML: &nbsp
 */

const N = 15;
$num = N * N;

echo '<h4>Matriz ',
    N,
    'x',
    N,
    ' elementos de enteros entre 0 y ',
    $num - 1,
    '</h4>';

for ($i = 0; $i < N; $i++) {
    for ($j = 0; $j < N; $j++) {
        // echo $i*N+$j, " ";
        echo $i * N + $j, '&nbsp', '&nbsp'; // Imprime después el valor con dos espacios en blanco
    }
    echo '<br/>'; // Salto de línea para cada línea de la matriz
}

/* Otra manera: saltar de línea cada N elementos escritos */

echo '<h4>Matriz ',
    N,
    'x',
    N,
    ' elementos de enteros entre 0 y ',
    $num - 1,
    ' formateados</h4>';

for ($i = 0; $i < $num; $i++) {
    if ($i % N == 0) {
        // Cada N elementos escritos, saltar de línea
        echo '<br/>';
    }

    // Rellena con ceros a la izquierda un string de 2 caracteres
    echo str_pad($i, 3, '0', STR_PAD_LEFT), '&nbsp', '&nbsp', '&nbsp';
}
