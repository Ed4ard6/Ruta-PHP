<?php
/* $edades = [
    "carlos" => 20,
    "maria" => 18,
    "juan" => 40
];
echo "La edad de Carlos es: " . $edades["carlos"] . "<br>\n";
echo "La edad de Maria es: " . $edades["maria"] . "<br>\n";
echo "La edad de Juan es: " . $edades["juan"] . "<br>\n"; */

$cafes = [
    "cafe" => 1.50,
    "capuchino" => 2.00,
    "latte" => 2.50
];

// echo "El precio del cafe es: {$cafes["cafe"]} <br>\n";

$personas = [
    "carlos" => [
        "edad" => 20,
        "ciudad" => "Madrid"
    ],
    "maria" => [
        "edad" => 18,
        "ciudad" => "Barcelona"
    ],
    "juan" => [
        "edad" => 40,
        "ciudad" => "Valencia"
    ]
];

echo "La edad de Carlos es: " . $personas["carlos"]["edad"] . " y el es de " . $personas["carlos"]["ciudad"] . " <br>\n";