<?php

function freddy() {

    $frase_freddy = "";
    switch (rand(1, 4)) {
        case 1:
            $frase_freddy = "Nunca pares de aprender \n";
            break;
        case 2:
            $frase_freddy = "Las empresas no son falimias \n";
            break;
        case 3:
            $frase_freddy = "La tecnologia es el futuro \n";
            break;
        case 4:
            $frase_freddy = "Amo PHP \n";
            break;
    }
    return $frase_freddy;
}

echo freddy() . "\n";