<?php
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
}
