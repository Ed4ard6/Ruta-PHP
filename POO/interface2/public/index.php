<?php
require_once __DIR__ . "/../vendor/autoload.php";

use App\Classes\Admin;
use App\Classes\User;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// -------------------------
// Configuración de Monolog
// -------------------------
$log = new Logger("app");
$log->pushHandler(new StreamHandler(__DIR__ . "/../log.txt", Logger::DEBUG));


$admin = new Admin("Eduardo");
echo $admin->getName() . "<hr>";
// $log->info("Se creó un Admin con nombre: {$admin->name}"); //al descomentar la linea se registra en el log al creacion del admin

$user = new User("Carlos");
echo $user->getName();
// $log->info("Se creó un User con nombre: {$user->name}"); //al descomentar la linea se registra en el log al creacion del user
