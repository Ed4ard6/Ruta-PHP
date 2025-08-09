<?php
echo "selecion lel parametro qque quieres convertir a segundos <br>
1. Minutos  <br>
2. Horas    <br>
3. Segundos <br>
";
//cmentario
$selecctor = readline("Digita la seleccion: ");

switch ($selecctor) {
    case '1':
        $minutos = readline("Ingresa los minutos: ");
        $segundos = (int)$minutos * 60;
        echo "Son $segundos segundos.";
        break;

    case '2':
        $horas = readline("Ingresa las horas: ");
        $segundos = (int)$horas * 3600;
        echo "Son $segundos segundos.";
        break;

    case '3':
        $segundos = readline("Ingresa los segundos: ");
        echo "Son $segundos segundos.";
        break;

    default:
        echo "Seleccion no valida.";
        break;
}
