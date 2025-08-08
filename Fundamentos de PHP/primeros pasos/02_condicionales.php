<?php
$course = "Curso profesional de PHP y laravel";
$price = 50000;
$date = "31/08/2025";
$archived = true;
$status = $archived ? "archivado" : "activo"; //Operador ternario
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
    <h2>The <?= $course?> have a price of <?= $price?> an your date of publication is the <?= $date?></h2>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quae facilis sit ab odio! Nam, dolorum excepturi nobis ab adipisci quos voluptatem autem minus facilis maiores quas ut nisi maxime ratione.</p>

    <p>Este curso esta <?= $status?></p>

</body>

</html>