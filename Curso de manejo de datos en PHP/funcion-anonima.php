<?php
$greet = function($name) { //variable que requiere logica de funcion
    return "Hello, $name parece que has aprendido bastante estos ultimos dias felicidades";
};

echo $greet("Eduardo") . "<hr>";


function greet(Closure $lang, $name) { //Closure es una clase predefinida en php para funciones anonimas, forza a que se unse una funciona anonima
    return $lang($name);
}

$es = function($name) {
    $message = "Bienvenido al mundo de PHP";
    return "Hola, $name $message";
};

$en = function($name) {
    $message = "Welcome to the world of PHP";
    return "Hello, $name $message";
};

echo greet($es, "Eduardo") . "<hr>\n";
echo greet($en, "Eduardo");
?>