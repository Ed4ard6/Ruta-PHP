<?php
// function suma($a = 1, $b = 1) {
//     echo "la suma del valor $a y $b es: " . ($a + $b) . "\n";
// }

// suma(5);
// suma();

// $arreglo1 = [1, 2, 3];
// $arreglo2 = [4, 5, 6];

// $resultado  = [...$arreglo1, ...$arreglo2];

/* function suma($a , $b ) {
    echo "la suma del valor $a y $b es: " . ($a + $b) . "\n";
}
$numeros = [5, 10, 11];
suma(...$numeros);

 */

function suma_infinita(...$numeros) {
    $resultado = 0;
    foreach ($numeros as $numero) {
        $resultado += $numero;
    }
    echo "la suma es: $resultado \n";
}
suma_infinita(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);