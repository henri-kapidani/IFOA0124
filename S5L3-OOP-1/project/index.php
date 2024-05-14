<?php

namespace project;

use \libA\User as UserA;
use \libB\User as UserB;
use \libB\Animal;

include __DIR__ . '/libs/libA/User.php';
include __DIR__ . '/libs/libB/User.php';
include __DIR__ . '/libs/libB/Car.php';

$myUser = new UserA('Pinco');
$userB = new UserB('Pallino');
$animal = new Animal();
$animal->eat();
$myUser->greet();
$userB->goodby();


$myCar = new \libB\subCategory\Car();
$myCar->start();