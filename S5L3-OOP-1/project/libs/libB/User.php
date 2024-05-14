<?php

namespace libB;

class User
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    function goodby()
    {
        echo "Goodby from " . $this->name . '<br>';
    }

    function buyCar()
    {
        $myNewCar = new subcategory\Car();
    }
}

class Animal
{
    function eat()
    {
        echo "I'm eating<br>";
    }
}
