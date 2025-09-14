<?php
session_start();

// Palabras posibles
$posibble_words = ['casa', 'perro', 'gato', 'elefante', 'jirafa'];
define('MAX_INTENTOS', 6);

// Inicializar juego si no existe
if (!isset($_SESSION['chosen_word'])) {
    $_SESSION['chosen_word'] = $posibble_words[array_rand($posibble_words)];
    $_SESSION['word_length'] = strlen($_SESSION['chosen_word']);
    $_SESSION['discovered_letters'] = str_pad('', $_SESSION['word_length'], '_');
    $_SESSION['attempts'] = 0;
    $_SESSION['messages'] = [];
}

// Reiniciar juego
if (isset($_POST['restart'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Procesar intento
if (isset($_POST['letter'])) {
    $player_letter = strtolower(trim($_POST['letter']));
    $chosen_word = $_SESSION['chosen_word'];

    if (empty($player_letter)) {
        $_SESSION['messages'][] = "Tú es que eres bruto o te la das escribe una letra sopla picha.";
        $_SESSION['attempts'] += 2;
        $_SESSION['messages'][] = "Por esa gracias pierdes 2 intentos por loca y te van quedando " . (MAX_INTENTOS - $_SESSION['attempts']) . " intentos.";
    } elseif (strlen($player_letter) !== 1) {
        $_SESSION['messages'][] = "Te dije UNA letra nada más caremonda.";
        $_SESSION['attempts'] += 2;
        $_SESSION['messages'][] = "Por esa gracias pierdes 2 intentos por loca y te van quedando " . (MAX_INTENTOS - $_SESSION['attempts']) . " intentos.";
    } elseif (!ctype_alpha($player_letter)) {
        $_SESSION['messages'][] = "Acaso '$player_letter' es una letra careverga.";
        $_SESSION['attempts'] += 2;
        $_SESSION['messages'][] = "Por esa gracias pierdes 2 intentos por loca y te van quedando " . (MAX_INTENTOS - $_SESSION['attempts']) . " intentos.";
    } else {
        if (str_contains($chosen_word, $player_letter)) {
            $offset = 0;
            while (($letter_position = strpos($chosen_word, $player_letter, $offset)) !== false) {
                $_SESSION['discovered_letters'][$letter_position] = $player_letter;
                $offset = $letter_position + 1;
            }
        } else {
            $_SESSION['attempts']++;
            $_SESSION['messages'][] = "Lo siento, la letra '$player_letter' no está en la palabra. Te quedan " . (MAX_INTENTOS - $_SESSION['attempts']) . " intentos.";
        }
    }
}

// Comprobar fin del juego
$game_over = false;
$final_message = '';
if ($_SESSION['attempts'] >= MAX_INTENTOS) {
    if ($_SESSION['discovered_letters'] === str_pad('', $_SESSION['word_length'], '_')) {
        $final_message = "Debe ser uno muy bruto en la vida para que con " . MAX_INTENTOS . " intentos no pegar ni una HP letra.";
    } else {
        $final_message = "¡Has perdido! La palabra era '" . $_SESSION['chosen_word'] . "'.";
    }
    $game_over = true;
} elseif ($_SESSION['discovered_letters'] === $_SESSION['chosen_word']) {
    $final_message = "¡Felicidades! Has adivinado la palabra '" . $_SESSION['chosen_word'] . "'.";
    $game_over = true;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego del Ahorcado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            text-align: center;
            padding: 30px;
        }
        .game-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
            display: inline-block;
            padding: 20px 40px;
            max-width: 600px;
        }
        h1 {
            color: #333;
        }
        .word {
            font-size: 2em;
            letter-spacing: 10px;
            margin: 20px 0;
        }
        .messages {
            text-align: left;
            background: #fafafa;
            padding: 10px;
            border: 1px solid #ddd;
            max-height: 150px;
            overflow-y: auto;
            margin: 20px 0;
            border-radius: 5px;
        }
        .messages p {
            margin: 5px 0;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 1em;
            width: 100px;
            text-align: center;
        }
        button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-btn {
            background: #28a745;
            color: white;
        }
        .restart-btn {
            background: #dc3545;
            color: white;
        }
        .final-message {
            font-size: 1.2em;
            color: #555;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="game-container">
        <h1>Juego del Ahorcado</h1>
        <p>La palabra a adivinar tiene <b><?= $_SESSION['word_length'] ?></b> letras.</p>
        <div class="word"><?= $_SESSION['discovered_letters'] ?></div>

        <?php if (!$game_over): ?>
            <form method="post">
                <input type="text" name="letter" maxlength="1" autofocus>
                <button type="submit" class="submit-btn">Adivinar</button>
                <button type="submit" name="restart" value="1" class="restart-btn">Reiniciar</button>
            </form>
        <?php else: ?>
            <div class="final-message"><?= $final_message ?></div>
            <form method="post">
                <button type="submit" name="restart" value="1" class="restart-btn">Jugar de nuevo</button>
            </form>
        <?php endif; ?>

        <div class="messages">
            <?php foreach ($_SESSION['messages'] as $msg): ?>
                <p><?= htmlspecialchars($msg) ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
