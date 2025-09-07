<?php

interface Search 
{
    public function all(); //declaracion del metodo
}

class User implements Search 
{
    public function all()
    {
        return "Obteniendo a los usuarios , XML"; //Desarrollo del metodo
    }
}
class Post implements Search 
{
    public function all()
    {
        return "Obteniendo a los Pots, JSON"; //Desarrollo del metodo
    }
}


$user = new User();
echo $user->all() . "<br>";

$post = new Post();
echo $post->all() . "<br>";
?>