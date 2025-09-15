<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {
    session_unset();
    session_destroy();
    session_start();
    init_game($palabras);
    redirect_to_self();
}

if (!isset($_SESSION['palabra'])) {
    init_game($palabras);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['letra'])) {
    $letra_raw = trim($_POST['letra']);
    $mensaje = '';

    if ($letra_raw === '') {
        $mensaje = "Escribe una letra, no seas vago.";
        $_SESSION['intentos'] += 2;
    } elseif (mb_strlen($letra_raw) !== 1 || !preg_match('/^[a-zA-Z]$/u', $letra_raw)) {
        $mensaje = "¡Una letra válida, por favor!";
        $_SESSION['intentos'] += 2;
    } else {
        $letra = mb_strtolower($letra_raw);
        if (in_array($letra, $_SESSION['letras'])) {
            $mensaje = "Ya probaste la letra '$letra'.";
        } else {
            $_SESSION['letras'][] = $letra;
            $palabra = $_SESSION['palabra'];
            $pal_chars = preg_split('//u', $palabra, -1, PREG_SPLIT_NO_EMPTY);
            $desc_chars = preg_split('//u', $_SESSION['descubiertas'], -1, PREG_SPLIT_NO_EMPTY);

            if (in_array($letra, $pal_chars)) {
                foreach ($pal_chars as $i => $ch) {
                    if ($ch === $letra) $desc_chars[$i] = $letra;
                }
                $_SESSION['descubiertas'] = implode('', $desc_chars);
                $mensaje = "Bien, acertaste la letra '$letra'!";
            } else {
                $_SESSION['intentos']++;
                $mensaje = "La letra '$letra' no está en la palabra.";
            }
        }
    }

    $_SESSION['flash'] = $mensaje;
    redirect_to_self();
}