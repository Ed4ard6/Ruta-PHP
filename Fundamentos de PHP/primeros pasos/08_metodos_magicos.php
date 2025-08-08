<?php
require 'Course.php';

$course = new Course(
    title : 'Curso profesional de PHP y laravel',
    subtitle: 'Aprende PHP y laravel desde cero',
    description:'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae harum aut distinctio cumque laudantium consectetur culpa, et facilis labore ab necessitatibus ratione quod fuga alias in unde consequatur dolore error.',
    tags:['PHP','Laravel','Desarollo Web', 'Backend','Programacion']
    
);

$autor1 = new Autor(
    sexo: 'el hombre',
    first_name: 'Eduardo',
    last_name: 'Machacón',
    age: 24,
    message: 'Este curso es patrocinado por ',
    frutas: ['Mango', 'Piña', 'Fresa', 'Limón', 'Banano'],
    color:'lightblue'

);

$autor2 = new Autor(
    sexo: ' la mujer',
    first_name: 'Rosa',
    last_name: 'Coronodano',
    age: 21,
    message: 'Este curso es patrocinado por ',
    frutas: ['Papaya', 'Mamón', 'Guanábana', 'Fresa', 'Banano'],
    color:'orange'

);


$course->addTag('Frameworks');
$course->addTag('Go');
$course->addTag('');
$course->addTag('R');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $course->title ?></title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .author-card {
            position: relative; /* Necesario para el efecto de luz */
            overflow: hidden; /* Para que el efecto no se salga de la tarjeta */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-top: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animación suave */
        }
        .author-card:hover {
            transform: translateY(-5px); /* Mueve la tarjeta hacia arriba */
            box-shadow: 0 8px 15px rgba(0,0,0,0.2); /* Sombra más pronunciada */
        }
        /* Efecto de foco de luz que sigue al ratón */
        .author-card::before {
            content: '';
            position: absolute;
            left: var(--x, 50%);
            top: var(--y, 50%);
            transform: translate(-50%, -50%);
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.25), transparent 60%);
            opacity: 0;
            transition: opacity 0.4s ease-out;
        }
        .author-card:hover::before {
            opacity: 1;
        }
    </style>
</head>

<body>
    <?= $course ?>

    <!-- <ul>
        <h3>Tags</h3>
        <?php foreach ($course->tags as $tag): ?>
                <li> <?= $tag ?></li>
        <?php endforeach; ?>
    </ul> -->
    <hr>
    <section class="author-card" style="background-color: <?= $autor1->color?>;">
        <?= $autor1 ?>
    </section>

    <section class="author-card" style="background-color: <?= $autor2->color?>;">
        <?= $autor2 ?>
    </section>

    <script>
        document.querySelectorAll('.author-card').forEach(card => {
            card.addEventListener('mousemove', e => {
                // e.offsetX y e.offsetY nos dan la posición del ratón relativa a la tarjeta
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                card.style.setProperty('--x', `${x}px`);
                card.style.setProperty('--y', `${y}px`);
            });
        });
    </script>
</body>

</html>