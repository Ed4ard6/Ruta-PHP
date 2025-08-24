<?php
$tiendita_de_cafes = array("Expreso" => 20, 
    "Capuchino" => 25, 
    "Latte" => 27.5, 
    "Americano" => 24
);

foreach ($tiendita_de_cafes as $cafe => $precio) {
    echo "El café {$cafe} tiene un precio de \${$precio} USD\n";
}