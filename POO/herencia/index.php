<?php

class User { //si usamos final al crear la clase indicamos que no se puede heredar nada de esta calse  
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {//final hace que no se pueda sobreescribir ese codigo si lo uso en otra calase
        $type = "usuario normal";
        $mesage = "Este es el nombre: $this->name y es un $type";
        return $mesage;
    }
}

class Admin extends User {
    public function getName() {
        $type = "usuario administrador";
        $mesage = "Este es el nombre: $this->name y es un $type";
        return $mesage;
    }
}

$admin = new Admin("Eduardo");
echo $admin->getName(). "<br>";

$admin = new User("Eduardo");
echo $admin->getName();

