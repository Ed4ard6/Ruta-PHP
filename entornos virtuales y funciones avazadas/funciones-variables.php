<?php 

function toga() {
    echo "Meow";
}

function rope() {
    echo "Woof";
}

function llocaba() {
    echo "ijiiii";
}

$function = 'toga';
$function(); // Meow
echo "\n\n\n";


function suma($n1, $n2) {
    echo  " la suam de ". $n1() . " + ". $n2() . " es ".$n1() + $n2();
}

function getNumber1() {
    return 5;
}
function getNumber2() {
    return 10;
}
function getNumber3() {
    return 15;
}


suma('getNumber3', 'getNumber2'); 