<?php
include_once __DIR__ . '/Employee.php';
include_once __DIR__ . '/../traits/Sport.php';
include_once __DIR__ . '/../traits/Sing.php';

class Manager extends Employee
{
    use Sport, Sing;

    public $nManagedEmployees;

    function __construct($name, $age, $nManagedEmployees)
    {
        parent::__construct($name, $age);
        $this->nManagedEmployees = $nManagedEmployees;
    }

    public function takeMeeting($projectName)
    {
        echo "Bla Bla Bla<br>";
    }

    public function employ()
    {
        echo "Welcome to the team<br>";
    }

    public function fire()
    {
        echo "You're fired<br>";
    }
}
