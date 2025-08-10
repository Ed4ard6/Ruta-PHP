<?php

$escuela = [
    
        [
            "nombre" => "Pelusa",
            "ocupacion" => "developer",
            "color" => "blanco",
            "Comidas" => ["Favoritas" => 
                "pescado y pollo", 
                "NoFavoritas" => "perro y cerdo"]
        ],
        [
            "nombre" => "Michi",
            "ocupacion" => "cazadora",
            "color" => "negro",
            "Comidas" => [
                "Favoritas" => "mirringo y catss", 
                "NoFavoritas" => "saladas y amargas"]
        ],
        [
            "nombre" => "Gatito",
            "ocupacion" => "customer services",
            "color" => "atigrado",
            "Comidas" => [
                "Favoritas" => "wiskas y pez", 
                "NoFavoritas" => "Dulces y agrias"]
        ]
    ];

// $michi = $escuela[1];
// echo "las comidas de favoritas de Michi son:". $michi["Comidas"]["Favoritas"];

$gatito = $escuela[2];
echo "El color de Gatito es: " . $gatito["color"];