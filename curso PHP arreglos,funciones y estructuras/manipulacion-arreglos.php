<?php

$edades = array(18, 20, 25, 30, 35, 40, 45, 50, 55, 60);

//count
echo count($edades);

// array_push
array_push($edades, 65, 70);

//is_array
$esto_no_es_un_arreglo = "Hola Mundo";
//var_dump(is_array($edades));

// explode
//$list_de_frutas = "manzana, banana, naranja, pera";
//$list_de_frutas_array = explode(", ", $list_de_frutas);
//var_dump($list_de_frutas_array);

//implode
$list_de_frutas_array = ["manzana", "banana", "naranja", "pera"];
$list_de_frutas = implode(" > ", $list_de_frutas_array);
var_dump($list_de_frutas);


