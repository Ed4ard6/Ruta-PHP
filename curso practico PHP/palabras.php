<?php

$palabras = array("Sol", "Luna", "Estrella", "Cielo", "Mar", "Rio");


$from = "<form action='analisis.php' method='POST'>";
$button = "<button type='submit'>Enviar</button></form>";
$fromCierre = "</form>";

for ($i = 0; $i < count($palabras); $i++) { 
    $from .= "La palabra: " . str_shuffle($palabras[$i]) . " <input type='text' name='palabra$i'><br>";
}
echo $from . $button . $fromCierre;

?>