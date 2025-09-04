<?php
$data = 'Estudio PHP';

echo $data[0]. '<hr>';

//___________________________________________________________

$post = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id totam, repudiandae architecto fugiat culpa magni magnam voluptates qui. Amet dolorum eius rerum aspernatur voluptatum est error veniam fuga beatae a.";
$extarct = substr($post, 0, 20);
echo $extarct . '... <a href="">Leer mas</a><hr>';
//___________________________________________________________.

$data2 = 'javaScript, php, laravel';  //campo tags
$tags = explode(',', $data2);
echo '<pre>'; //aray
var_dump($tags) ;
echo '<hr>';
//___________________________________________________________

$cursos = ['javaScript', 'php', 'laravel'];
echo implode(', ' , $cursos), "<hr>";
//___________________________________________________________

$course = "    Curso de PHP     ";
// $course = ltrim($course); //elimina espacios a la izquierda
// $course = rtrim($course); //elimina espacios a la derecha
$course = trim($course); //Elimina todos los espacios de ambos lados
echo "<pre>";
echo "Quiero aprender $course, y otro texto <hr>";
//___________________________________________________________