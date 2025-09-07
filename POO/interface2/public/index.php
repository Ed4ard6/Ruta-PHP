<?php
require_once __DIR__ . "/../vendor/autoload.php";

use App\Classes\Admin;
use App\Classes\User;

$admin = new Admin("Eduardo");
echo $admin->getName() . "<hr>";

$user = new User("Eduardo");
echo $user->getName();