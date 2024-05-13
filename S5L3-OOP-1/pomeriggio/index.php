<?php
setcookie('ciao', 'non so', time() - 24 * 60 * 60);

include './Form.php';

// form 1
$myForm1 = new Form('GET', './');
$myForm1->addLabel('Name', 'name');
$myForm1->addInput('text', 'name', 'name');
$myForm1->addLabel('Age', 'age');
$myForm1->addInput('number', 'age', 'age', 18);
$myForm1->addSumbit('Invia dati');


// form 2
$myForm2 = new Form('POST', '/add-product.php');
$myForm2->addLabel('Product ID', 'pid');
$myForm2->addInput('text', 'pid', 'pid');
$myForm2->addLabel('Price', 'price');
$myForm2->addInput('number', 'price', 'price');
$myForm2->addLabel('Password', 'pass');
$myForm2->addInput('password', 'pass', 'pass');
$myForm2->addSumbit('Add product');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form OOP</title>
</head>

<body>
    <h1>Forms</h1>
    <h2>Form 1</h2>
    <?= $myForm1->render(); ?>
    <h2>Form 2</h2>
    <?= $myForm2->render(); ?>
</body>

</html>