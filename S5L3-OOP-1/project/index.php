<?php

include __DIR__ . '/libs/libA/index.php';
include __DIR__ . '/libs/libB/index.php';

$myUser = new User('Pinco');
$myUser->greet();
