<?php

// creare la classe Form con la proprietà che contiene l'HTML del form
// i metodi per aggiungere labels ed inputs
// un metodo per renderizzare il form
// e un costruttore per passare gli attributi del form
class Form
{
}

$myForm = new Form('POST', 'action');

$myform->addLabel('text', 'id-for');
$myForm->addInput('type', 'name', 'value', 'id-for');

$myform->addLabel('text', 'id-for');
$myForm->addInput('type', 'name', 'value', 'id-for');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php $myform->render(); ?>
</body>

</html>