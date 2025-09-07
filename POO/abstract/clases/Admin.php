<?php
require_once 'Base2.php';


class Admin extends Base2 
{
    public function __construct($name)
    {
        $this->name = $name;
    }
}