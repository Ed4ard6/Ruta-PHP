<?php

$usernames = [ "pedro", "juan", "maria" ];

do {
    $username = readline("Ingrese su nombre de usuario: ");
    if (in_array($username, $usernames)) {
        echo "El usuario '{$username}' ya está registrado. Por favor, intente con otro.\n";
    }
} while (in_array($username, $usernames));

echo "¡Usuario '{$username}' registrado exitosamente!\n";
