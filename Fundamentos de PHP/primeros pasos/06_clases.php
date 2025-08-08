<?php

/* class Course{
    public $title;
    public $subtitle;
    public $description;
    public $tags;

    public function __construct($title, $subtitle, $description, $tags)
    {
        $this->title =$title;
        $this->subtitle =$subtitle;
        $this->description =$description;
        $this->tags =$tags;
    }
} */

class Course{
    public function __construct(
        public $title,
        public $subtitle,
        public $description,
        public $tags
    )
    {
        //Constructor code here
    }
}

class Autor{
    public function __construct(
        public $sexo,
        public $first_name,
        public $last_name,
        public $age

    )
    {
        //Constructor code here
    }
}

$course = new Course(
    title : 'Curso profesional de PHP y laravel',
    subtitle: 'Aprende PHP y laravel desde cero',
    description:'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae harum aut distinctio cumque laudantium consectetur culpa, et facilis labore ab necessitatibus ratione quod fuga alias in unde consequatur dolore error.',
    tags:['PHP','Laravel','Desarollo Web', 'Backend','Programacion']
    
);
$autor = new Autor(
    sexo:'Masculino',
    first_name: 'Eduardo',
    last_name: 'Machacon',
    age : 24
)



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $course->title ?></title>
</head>

<body>
    <h1>Bienvenido al <?= $course->title ?> </h1><!-- asi se puede usar cosifgo de phpp de forma mas corta -->
    <h2><?= $course->subtitle ?></h2>

    <p> <?= $course->description ?></p>

                <!-- Automatizacion con foreach funcional pero no tan legible -->
    <p>
        <strong>Etiquetas:</strong>
        <ul>
            <?php 
            foreach ($course->tags as $tag) {
                echo "<li>$tag</li>";
            }
            ?>
        </ul>
    </p>
                <!-- Automatizacion con foreach las legible para la mezcla con HTML -->
    <p>
        <strong>Etiquetas:</strong>
        <ul>
            <?php foreach ($course->tags as $tag): ?>
                <li> <?= $tag ?></li>
            <?php endforeach; ?>
        </ul>
    </p>
    <p>
        Este curso fue creado por <?= $autor->sexo?> <?= $autor->first_name?> <?= $autor->last_name?> que tiene <?= $autor->age?> 
    </p>
</body>

</html>