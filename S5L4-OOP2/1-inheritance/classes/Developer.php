<?php
include_once __DIR__ . '/Employee.php';
include_once __DIR__ . '/../traits/Sport.php';

class Developer extends Employee
{
    use Sport;

    public $lineOfCodes = 100000;

    function __construct($name, $age, $lineOfCodes)
    {
        parent::__construct($name, $age);
        $this->lineOfCodes = $lineOfCodes;
    }

    public function deploy($projectName)
    {
        echo "Sto deployando il progetto $projectName, lasciatemi in pace<br>";
    }

    public function askRise()
    {
        parent::askRise();
        echo "I wrote a lot of line of codes, exaclty $this->lineOfCodes<br>";
    }
}
