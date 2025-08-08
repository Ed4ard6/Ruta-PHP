<?php

$app = require __DIR__ . '/../boopstrap.php';

$question = $_POST['question'] ?? '';
$answer = '';

// Convertimos la pregunta a minúsculas para la comprobación
$normalizedQuestion = trim(strtolower($question));

if (in_array($normalizedQuestion, ['exit', 'salir'])) {
    // Si el usuario escribe "salir" o "exit", mostramos un mensaje de despedida
    $answer = '¡Gracias por usar el chat!';
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $question) {
    // Si no, enviamos la pregunta a la IA como siempre
    $answer = $app->getResponse($question);
}
?>

<form method="POST">
    <label for="question">Question</label>
    <input type="text" name="question" id="question" value="<?= htmlspecialchars($question) ?>" required>
    <input type="submit" value="Ask">
</form>

<p>
    <strong>Answer:</strong>
    <?= htmlspecialchars($answer) ?>
</p>
