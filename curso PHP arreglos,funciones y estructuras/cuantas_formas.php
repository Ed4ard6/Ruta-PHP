<?php

$numero_de_tienda = readline("Ingrese el número de tiendas: ");
$anterior = 0;
$actual = 1;
for ($i = 2;  $i <= $numero_de_tienda; $i++) {
    $temporal = $actual;
    $actual = $actual + $anterior;
    $anterior = $temporal;

    echo " el valor de temporal es $temporal \n";
    echo " el valor de actual es $actual \n";
    echo " el valor de anterior es $anterior \n________________________________\n";

}

echo " Hay $actual formas de recorrer las tiendas \n";