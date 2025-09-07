<?php
require_once 'Base2.php';

class User extends Base2 
{
    public function __construct($name)
    {
        $this->name = $name;
    }
}
?>