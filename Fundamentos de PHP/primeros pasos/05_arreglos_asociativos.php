<?php
$course = [
    'title' => "Curso profesional de PHP y laravel",
    'subtitle' => "Aprende PHP y laravel desde cero",
    'description' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae harum aut distinctio cumque laudantium consectetur culpa, et facilis labore ab necessitatibus ratione quod fuga alias in unde consequatur dolore error.",
    'tags' => [
        "PHP",
        "Laravel",
        "JavaScript",
        "HTML",
        "CSS",
        "Angular",
        "MySQL",
    ],
];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $course['title'] ?></title>
</head>

<body>
    <h1>Bienvenido al <?= $course['title'] ?> </h1><!-- asi se puede usar cosifgo de phpp de forma mas corta -->
    <h2><?= $course['subtitle'] ?></h2>

    <p> <?= $course['description'] ?></p>

                <!-- Automatizacion con foreach funcional pero no tan legible -->
    <p>
        <strong>Etiquetas:</strong>
        <ul>
            <?php 
            foreach ($course['tags'] as $tag) {
                echo "<li>$tag</li>";
            }
            ?>
        </ul>
    </p>
                <!-- Automatizacion con foreach las legible para la mezcla con HTML -->
    <p>
        <strong>Etiquetas:</strong>
        <ul>
            <?php foreach ($course['tags'] as $tag): ?>
                <li> <?= $tag ?></li>
            <?php endforeach; ?>
        </ul>
    </p>

</body>

</html>