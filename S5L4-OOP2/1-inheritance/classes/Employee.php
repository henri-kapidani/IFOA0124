<?php
include_once __DIR__ . '/Person.php';
include_once __DIR__ . '/../interfaces/StandardEmployee.php';


class Employee extends Person implements StandardEmployee
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
