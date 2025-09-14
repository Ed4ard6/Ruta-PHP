<?php
define('MAX_INTENTOS', 6);

if (isset($_GET['reset'])) {
    session_destroy();
    header("Location: ahorcado.php");
    exit;
}

if (!isset($_SESSION['word'])) {
    $words = ['casa', 'perro', 'gato', 'elefante', 'jirafa'];
    $_SESSION['word'] = strtolower($words[array_rand($words)]);
    $_SESSION['discovered_letters'] = str_repeat('_', strlen($_SESSION['word']));
    $_SESSION['attempts'] = 0;
    $_SESSION['used_letters'] = [];
    $_SESSION['game_over'] = false;
    $_SESSION['mensaje'] = null;
    $_SESSION['tipo_mensaje'] = null;
    $_SESSION['final_message'] = null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$_SESSION['game_over']) {
    $letter = strtolower($_POST['letter'] ?? '');

    if (empty($letter)) {
        $_SESSION['mensaje'] = "Tu es que eres bruto o te la das escribe una letra sopla picha 🤦‍♂️";
        $_SESSION['tipo_mensaje'] = "penalty";
        $_SESSION['attempts'] += 2;
    } elseif (strlen($letter) !== 1) {
        $_SESSION['mensaje'] = "Te dije UNA letra nada más caremonda 😒";
        $_SESSION['tipo_mensaje'] = "penalty";
        $_SESSION['attempts'] += 2;
    } elseif (!ctype_alpha($letter)) {
        $_SESSION['mensaje'] = "Acaso '$letter' es una letra careverga? 😡";
        $_SESSION['tipo_mensaje'] = "penalty";
        $_SESSION['attempts'] += 2;
    } elseif (in_array($letter, $_SESSION['used_letters'])) {
        $_SESSION['mensaje'] = "Ya probaste la letra '$letter'. No seas bruto.";
        $_SESSION['tipo_mensaje'] = "penalty";
        $_SESSION['attempts']++;
    } else {
        $_SESSION['used_letters'][] = $letter;
        if (str_contains($_SESSION['word'], $letter)) {
            $offset = 0;
            while(($pos = strpos($_SESSION['word'], $letter, $offset)) !== false) {
                $_SESSION['discovered_letters'][$pos] = $letter;
                $offset = $pos + 1;
            }
            $_SESSION['mensaje'] = "Bien ahí! Encontraste la letra '$letter'.";
            $_SESSION['tipo_mensaje'] = "ok";
        } else {
            $_SESSION['mensaje'] = "Lo siento, '$letter' no está en la palabra. Pierdes un intento.";
            $_SESSION['tipo_mensaje'] = "penalty";
            $_SESSION['attempts']++;
        }
    }

    if ($_SESSION['discovered_letters'] === $_SESSION['word']) {
        $_SESSION['game_over'] = true;
        $_SESSION['final_message'] = "¡Felicidades! Has adivinado la palabra '{$_SESSION['word']}' 🎉";
    } elseif ($_SESSION['attempts'] >= MAX_INTENTOS) {
        $_SESSION['game_over'] = true;
        $_SESSION['final_message'] = "¡Has perdido! La palabra era '{$_SESSION['word']}' 😭";
    }
}
