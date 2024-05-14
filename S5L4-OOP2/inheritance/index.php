<?php
include_once __DIR__ . '/classes/Person.php';
include_once __DIR__ . '/classes/Employee.php';
include_once __DIR__ . '/classes/Developer.php';
include_once __DIR__ . '/classes/Manager.php';


// echo '<h2>Person</h2>';
// $aPerson = new Person('Pinco', 30);
// // $aPerson->miachiave = 'Pinco';
// echo $aPerson->age;
// $aPerson->askVacation();

echo '<h2>Developer</h2>';
$developerZero = new Developer('John', 29, 15000);
$developerZero->age = 29;
echo $developerZero->age;
echo '<br>';
$developerZero->deploy('Facebook');
$developerZero->askVacation(60);
// $developerZero->name = "Bob";
// $developerZero->setName('Bob');
$developerZero->askRise(); // Bob
// echo $developerZero->getName(); // Bob?
$developerZero->exercise();

echo '<h2>Employee</h2>';
$myEmployee = new Employee('Pallino', 39);
echo $myEmployee->age;
echo '<br>';
$myEmployee->askVacation(30);

echo '<h2>Manger</h2>';
$theManager = new Manager('Rossi', 42, 10);
$theManager->askVacation(30);
$theManager->sing();
$theManager->falsetta();
$theManager->exercise();
