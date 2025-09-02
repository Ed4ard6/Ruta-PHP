<?php


function clear_screen()
{
    system('clear');
}

function validattor_letter($letter)
{         
    $response = ['is_valid' => true, 'message' => ''];
    if (empty($letter)) {
        $response['is_valid'] = false;
        $response['message'] = "Tu es que eres bruto o te la das escribe una letra sopla picha\n";
    } else if (strlen($letter) !== 1) {
        $response['is_valid'] = false;
        $response['message'] = "Te dije UNA letra nada mas caremonda\n";
    } else if (!ctype_alpha($letter)) {
        $response['is_valid'] = false;
        $response['message'] = "Acaso $letter es una letra careverga \n";
    } 

    return $response;
}

$posibble_words = ['casa', 'perro', 'gato', 'elefante', 'jirafa'];

define('MAX_INTENTOS', 6);

//Inicializamodel juego 
$chosen_word = $posibble_words[rand(0, 4)];
$chosen_word = strtolower($chosen_word);
$word_length = strlen($chosen_word);
$discovered_letters = str_pad('', $word_length, '_');
$attempts = 0;


do {
    echo "¡Bienvenido al juego del ahorcado!\n";
    echo "La palabra a adivinar tiene $word_length letras.\n";
    echo $discovered_letters . "\n";

    //pedimos al usuario que escriba

    $player_letter = readline("Escribe una letra: ");
    $validation_result = validattor_letter($player_letter);
    if (!$validation_result['is_valid']) {
        clear_screen();
        echo $validation_result['message'];
        sleep(3);
        clear_screen();
        $attempts+= 2;
        echo  "Por esa gracias pierdes 2 intentos por loca y te van quedando " . (MAX_INTENTOS - $attempts) . " intentos\n";
        sleep(3);
        clear_screen();
        continue;
    }
    $player_letter = strtolower($player_letter);


    if (str_contains($chosen_word, $player_letter)) {
        $offset = 0;
        while (
            ($letter_position = strpos($chosen_word, $player_letter, $offset))
            !== false
        ) {

            $discovered_letters[$letter_position] = $player_letter;
            $offset = $letter_position + 1;
        }
    } else {
        clear_screen();
        $attempts++;
        echo "Lo siento, la letra '$player_letter' no está en la palabra. Te quedan " . (MAX_INTENTOS - $attempts) . " intentos.\n";
        sleep(2);
    }

    clear_screen();
} while ($attempts < MAX_INTENTOS && $discovered_letters !== $chosen_word);

clear_screen();
if ($attempts === MAX_INTENTOS && $discovered_letters === str_pad('', $word_length, '_'))
    echo "Debe ser uno muy bruto en la vida para que con ". MAX_INTENTOS ." intentos no pegar ni una HP letra ";
else if ($attempts === MAX_INTENTOS)
    echo "¡Has perdido! La palabra era '$chosen_word'.\n";
else
    echo "¡Felicidades! Has adivinado la palabra '$chosen_word'.\n";


