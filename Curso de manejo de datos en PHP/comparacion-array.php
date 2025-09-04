<?php


$courses = ['javascript', 'php'];
$wishes = ['javascript', 'php', 'laravel', 'symfony', 'react', 'vuejs'];

echo "<pre>";
var_dump(array_diff($wishes, $courses)); //compara dos arrays y devuelve los valores que no estan en el primer array pero si en el segundo
// var_dump(array_intersect($wishes, $courses)); //compara dos arrays y devuelve los valores que estan en ambos arrays