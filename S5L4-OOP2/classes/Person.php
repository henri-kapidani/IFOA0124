<?php

abstract class Person
{
    protected $name = 'Default name';
    public $age = 18;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function getName()
    {
        return $this->name;
    }

    function setName($name)
    {
        $this->name = $name;
    }
}
