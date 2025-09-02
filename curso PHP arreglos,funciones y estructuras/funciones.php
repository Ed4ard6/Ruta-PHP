<?php

function get_pokemon() {
$numero_aleatorio = rand(1, 5);
    echo "el  numero aleatorio fue $numero_aleatorio \n";

    switch ($numero_aleatorio){
    case 1:
        echo "Bulbasaur \n";
        break;
    case 2:
        echo "Ivysaur \n";
        break;
    case 3:
        echo "Venusaur \n";
        break;
    default:
        echo "No se encontró el pokémon \n";
    }
}

for ($i=1; $i <= 20; $i++) { 
    echo "vuelta #$i \n";
    get_pokemon();
    echo "---------------------------------------------------------------------------\n";
}