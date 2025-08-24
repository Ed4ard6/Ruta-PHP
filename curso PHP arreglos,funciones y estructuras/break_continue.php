<?php
$tiendita_de_cafes = array(
    "Expreso" => 20, 
    "Capuchino" => 25, 
    "Recalentado" => 10,
    "Latte" => 27.5, 
    "Americano" => 24
);

/* foreach ($tiendita_de_cafes as $cafe => $precio) {

    echo "Actualmente encontree al cafe $cafe \n";

    if ($cafe == "Latte") {
        echo "El café {$cafe} tiene un precio de \${$precio} USD\n";
        break;
    }
}
echo "\n____________________________________\n\n"; */
foreach ($tiendita_de_cafes as $cafe => $precio) {

    if ($cafe == "Recalentado") 
        continue;
    
    echo "The coffee $cafe is very deloicious \n";

}