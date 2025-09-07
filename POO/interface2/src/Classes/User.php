<?php
namespace App\Classes;
use App\Interfaces\Person;

class User implements Person {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return "El nombre del Usuario es: $this->name";
    }
}