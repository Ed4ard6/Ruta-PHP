<?php

// $frontend = ['javascript'];
// $backend = ['php', 'laravel'];

// echo "<pre>";
// var_dump(array_merge($frontend, $backend)); //une dos arrays en uno solo

$courses = ['javascript', 'php', 'laravel'];
$categories = ['front', 'back', 'framework'];

echo "<pre>";

var_dump(array_combine($categories, $courses ));
