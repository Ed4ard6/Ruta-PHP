<?php
// echo "<pre>";
//Alterar datos
$text = "PHP es UN Lenguaje de Programacion, año 2020, programación";
echo $text . '<br>';
echo strtolower($text) . ' strtolower <br>';         //todo minuscula
echo strtoupper($text) . ' strtoupper <br>';         //todo mayuscula
echo ucfirst($text) . ' ucfirst <br>';               //priemera letra mayuscula
echo ucwords(strtolower($text)) . ' ucwords con strtolower <br>';   //primera letra de cada palabra mayuscula
echo lcfirst($text) . ' lcfirst <br>';               //primera letra minuscula

echo "<hr>";
//___________________________________________________________
//reemplazar datos
$slug = str_replace(' ', '-', strtolower($text));
echo $slug . '<br>';
$slug = str_replace(' ', '-', $text);
echo strtolower($slug) . '<hr>';

//___________________________________________________________
//modificacion

$code = 39;
echo str_pad($code, 8, '0', STR_PAD_LEFT) . '<br>'; //00000039
echo str_pad($code, 8, '0', STR_PAD_RIGHT) . '<br>'; //39000000
echo str_pad($code, 8, '0', STR_PAD_BOTH) . '<br>'; //00039000
$text2 = "<h1>PHP es UN Lenguaje de Programacion </h1>";
echo "<pre>";
echo strip_tags($text2) . '   eliminacion de etiqueta H1<hr>';// elimina todo los que tenga <>
//___________________________________________________________

echo strtoupper($text) . '<br>'; //Monobyte
echo mb_strtoupper($text) . '<br>'; //Multibyte