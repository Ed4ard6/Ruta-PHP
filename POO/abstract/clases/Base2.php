<?php
abstract class Base2 
{
    protected $name;
    private function gestClassName()
    {
        return get_called_class();
    }
    public function login()
    {
        return "Mi nombre es $this->name y desde la clase {$this->gestClassName()} ";
    }
}