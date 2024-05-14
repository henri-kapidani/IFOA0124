<?php

abstract class Person
{
    static public $greeting = 'Ciao a tutti<br>';
    static public $count = 0;

    protected $name = 'Default name';
    public $age = 18;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
        self::$count++;
    }

    function __destruct()
    {
        self::$count--;
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
