<?php
$palabras = array("Sol", "Luna", "Estrella", "Cielo", "Mar", "Rio");

For ($i=0 ; $i < count($palabras); $i++) { 
    if ($_REQUEST["palabra$i"] == $palabras[$i]) {
        echo "La palabra ".$_REQUEST["palabra$i"] ." es correcta <hr>";
    } else {
        echo "La palabra ingresada ".$_REQUEST["palabra$i"] ." es incorrecta la palabra correcta es $palabras[$i] <hr>";
    }
}

?>