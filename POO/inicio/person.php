<?php 
require_once 'admin.php';
require_once 'user.php';

class Person 
{
    public $name;
    public function greet()
    {
        return "Hello! $this->name";
    }
}