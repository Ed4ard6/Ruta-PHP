<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);try {
    $dotenv->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    echo "Error: El archivo .env no se encontró en la ruta especificada." . PHP_EOL;
    echo "Asegúrate de que el archivo .env exista en la raíz del proyecto." . PHP_EOL;
    exit(1);
}
//$aiService = new App\OllamaAiService();
//$aiService = new App\FakeAiService();

try {
    $aiService = new App\OpenAiService();
} catch (\InvalidArgumentException $e) { 
    echo "Error de Configuración: " . $e->getMessage() . PHP_EOL;
    exit(1);
} 

return new App\Chat($aiService);