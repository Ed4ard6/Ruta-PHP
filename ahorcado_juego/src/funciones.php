<?php

function init_game($palabras) {
    $_SESSION['palabra'] = $palabras[array_rand($palabras)];
    $_SESSION['descubiertas'] = str_repeat('_', mb_strlen($_SESSION['palabra']));
    $_SESSION['intentos'] = 0;
    $_SESSION['letras'] = [];
    $_SESSION['flash'] = '';
}

function redirect_to_self() {
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}