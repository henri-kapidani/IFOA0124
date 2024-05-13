<?php
class User
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    function greet()
    {
        echo "Hi from " . $this->name . '<br>';
    }
}
