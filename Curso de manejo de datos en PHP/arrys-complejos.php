<?php


$courses = [
    'frintend' => 'javascript',
    'framework' => 'laravel',
    'backend' => 'php'
];

function upper($course, $key) {
    echo strtoupper($course) .": " . ucfirst($key) . "<hr>";
}

array_walk($courses, 'upper'); //array_walk es una funcion predefinida en php que recorre un array y aplica una funcion a cada uno de sus elementos


/**
 * array_key_exists('frontend', $courses'); — Comprueba si una clave o índice existe en un array
 * in_array('frontend', $courses); — Comprueba si un valor existe en un array
 * array_keys($courses); — Devuelve todas las claves o índices de un array
 * array_values($courses); — Devuelve todos los valores de un array
 */