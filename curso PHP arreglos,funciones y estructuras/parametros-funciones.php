<?php

function es_estufdiante_leyend($platzi_rank) {

    if ($platzi_rank > 20000)    {
        echo "Felicidades eres un estudiante leyenda \n";
    } else {
        echo "Aun no eres un estudiante leyenda sigue aprendiendo para poder serlo \n";

    }
}

do 
    es_estufdiante_leyend(readline("Cual es la cantidad de plazi que tienes?: "));
while (true);