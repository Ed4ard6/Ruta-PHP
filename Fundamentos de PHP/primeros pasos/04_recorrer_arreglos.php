<?php
$course = "Curso profesional de PHP y laravel";
$tags = [
    "PHP",//0
    "Laravel",//1
    "JavaScript",//2
    "HTML",//3
    "CSS",//4
    "Angular",//5
    "MySQL"
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $course ?></title>
</head>

<body>
    <h1>Bienvenido al <?= $course ?> </h1><!-- asi se puede usar cosifgo de phpp de forma mas corta -->
                <!-- Automatizacion con foreach funcional pero no tan legible -->
    <p>
        <strong>Etiquetas:</strong>
        <ul>
            <?php 
            foreach ($tags as $tag) {
                echo "<li>$tag</li>";
            }
            ?>
        </ul>
    </p>
                <!-- Automatizacion con foreach las legible para la mezcla con HTML -->
    <p>
        <strong>Etiquetas:</strong>
        <ul>
            <?php foreach ($tags as $tag): ?>
                <li>$tag</li>
            <?php endforeach; ?>
        </ul>
    </p>

</body>

</html>