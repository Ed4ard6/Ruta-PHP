<?php
function get_name_country_swich($contry){
    switch ($contry) {
        case 'CO':
            return 'Colombia';
            break;
        case 'MX':
            return 'Mexico';
            break;
        case 'PE':
            return 'Peru';
            break;
        case 'ES':
            return 'España';
            break;
        case 'AR':
            return 'Argentina';
            break;
        default:
            return 'No conocemos ese pais';
            break;
    }
}

function get_name_country_match($contry){
    return match ($contry) {
        'CO' => 'Colombia',
        'MX' => 'Mexico',
        'PE' => 'Peru',
        'ES' => 'España',
        'AR' => 'Argentina',
        default => 'No conocemos ese pais',
    };
}

echo get_name_country_swich('CO');
echo "\n";