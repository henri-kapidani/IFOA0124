<?php
include_once __DIR__ . '/Person.php';

class Employee extends Person
{
    public function askVacation($nDays)
    {
        echo "I want $nDays days of vacation<br>";
    }

    public function askRise()
    {
        echo "I want a rise, my name is $this->name<br>";
    }
}
