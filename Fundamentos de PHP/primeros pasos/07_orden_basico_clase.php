<?php
require 'Course.php';

$course = new Course(
    title : 'Curso profesional de PHP y laravel',
    subtitle: 'Aprende PHP y laravel desde cero',
    description:'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae harum aut distinctio cumque laudantium consectetur culpa, et facilis labore ab necessitatibus ratione quod fuga alias in unde consequatur dolore error.',
    tags:['PHP','Laravel','Desarollo Web', 'Backend','Programacion']
    
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
    <title><?= $course->getTitle() ?></title>
</head>

<body>
    <h1>Bienvenido al <?= $course->getTitle() ?> </h1><!-- asi se puede usar cosifgo de phpp de forma mas corta -->
    <h2><?= $course->getSubtitle() ?></h2>

    <p> <?= $course->getDescription() ?></p>
    <p>
        <strong>Etiquetas:</strong>
        <ul>
            <?php foreach ($course->getTags() as $tag): ?>
                <li> <?= $tag ?></li>
            <?php endforeach; ?>
        </ul>
    </p>
</body>

</html>

<!-- code archivo course 

<?php 

class Course{
    public function __construct(
        protected $title,
        protected $subtitle,
        protected $description,
        protected $tags
    )
    {
        //Constructor code here
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    
    public function getSubtitle(): string
    {
        return $this->subtitle;
    }
    
    public function getDescription(): string
    {
        return $this->description;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function addTag(string $tag):void
    {
        if (in_array($tag, $this->tags) || empty($tag) || count($this->tags) >= 7) {
            return;
        } 
        $this->tags[] = $tag;
    }
}
?>

-->