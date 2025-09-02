<?php
date_default_timezone_set('America/bogota');

function dame_la_hora() {
    return date('h:i a');
}   

echo "¡Hola! ¿Me puedes decir qué hora es?\n";

echo "Claro, son las " . dame_la_hora() . "\n";