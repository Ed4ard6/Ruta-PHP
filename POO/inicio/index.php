<?php
require_once 'admin.php';
require_once 'user.php';
require_once 'person.php';

$user = new User;
$user->type = new Admin;
echo $user->type->greet();