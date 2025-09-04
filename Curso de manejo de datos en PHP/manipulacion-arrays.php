<?php
$courses = [
    10 => 'php',
    20 => 'javascript',
    30 => 'laravel',
    40 => 'symfony',
    50 => 'react',
    60 => 'vue'
];
// sort($courses); //ordena el array de menor a mayor
// rsort($courses); //ordena el array de mayor a menor
// ksort($courses); //Ordena el array por clave de menor a mayor
krsort($courses); //Ordena el array por clave de mayor a menor

echo "<pre> <hr>";
// var_dump($courses);


// var_dump(array_slice($courses, 3)); quira los primeros 3 elementos


$courses2 = ['php', 'javascript', 'laravel', 'symfony', 'react', 'vue'];

var_dump(array_chunk($courses2, 2));