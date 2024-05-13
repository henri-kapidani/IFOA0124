<?php

class Animal
{
    private $name;
    private $weight;
    public $color = 'white';

    function __construct($name, $weight, $color)
    {
        $this->setName($name);
        $this->setWeight($weight);
        $this->color = $color;
    }

    function __destruct()
    {
        echo 'Mi hai distrutto, brutto.<br>';
    }

    function introduceYourselef()
    {
        echo 'Ciao mi chiamo ' . $this->name . '<br>';
    }

    function eat()
    {
        echo 'Sto mangiando<br>';
    }

    function sleep()
    {
        echo 'Sto dormendo<br>';
    }

    function setName($name)
    {
        if (strlen($name) < 10) {
            $this->name = $name;
        }
    }

    function getName()
    {
        return $this->name;
    }

    function setWeight($weightKg)
    {
        $this->weight = $weightKg * 1000;
    }

    function getWeight()
    {
        return $this->weight / 1000;
    }
}

// Animal->sleep();
// eat();

$myPet = new Animal('Beasty', 2, 'black');
$yourPet = new Animal('Fuffy', 0.5, 'white');
// var_dump($myPet);

// $myPet->setName('New Nameasdfasdfasfadsfdsa');
$yourPet = null;
$myPet->introduceYourselef();
// $yourPet->introduceYourselef();

echo '<br>';

// $myPet->setWeight(1);
// echo $myPet->weight . '<br>';
echo $myPet->getWeight();
echo '<br>';














// $myPet->eat();
// $myPet->name = 'Beasty';
// $myPet->introduceYourselef();
// echo $myPet->name;
// echo '<br>';

// $yourPet->sleep();
// $yourPet->name = 'Fuffy';
// $yourPet->introduceYourselef();
// echo $yourPet->name;
// echo '<br>';

// echo $myPet->name;
// echo '<br>';

// echo $yourPet->color;
// echo '<br>';
// echo $yourPet->color;
// echo '<br>';
