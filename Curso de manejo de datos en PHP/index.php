<?php

echo 'Un texto de una linea
varias lineas\' bacjlash \\ continuar texto <br>';

$name = 'Eduardo';
echo "My name is $name <br>";

$course = [
    'backend' => [
        'PHP',
        'Laravel',
        'Python'
    ],  
];

class User {
    public $name = 'Eduardo';
}
$user = new User();

echo "$user->name quiere aprendrer {$course['backend'][0]} <hr>";

//____________________________________________________________

$student = 'eduardo';
$eduardo = 'Estudiante de PHP';

echo "$student es " . $$student." <hr>";
//___________________________________________________________


function getEstudent (){
    return 'eduardo';
}
 
$estudent = getEstudent();
echo "$estudent es " . $$estudent." <hr>";