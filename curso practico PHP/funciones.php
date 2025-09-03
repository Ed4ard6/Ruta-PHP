<?php
// $name = "Eduardo";
// $last_name = "Machacon";


function concatenar($nombre, $apellido)
{
    return "Hola mi nombre es: " . $nombre . " " . $apellido . "\n";

}

echo concatenar("Eduardo", "Machacon");

function suma($numeros)
{
    $suma = 0;
    for ($i = 0; $i < count($numeros); $i++) {
        $suma += $numeros[$i];
    }
    return "La suma de los valores del aray es:  $suma"; 
}

$numeros = [10, 2, 3, 5];
echo suma($numeros) ;