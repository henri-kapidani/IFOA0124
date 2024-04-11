<?php

$host = 'localhost';
$db   = 'ifoa_pizzeria';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// comando che connette al database
$pdo = new PDO($dsn, $user, $pass, $options);

// SELECT DI TUTTE LE RIGHE
$stmt = $pdo->query('SELECT * FROM dishes');

// eseguito il primo foreach il cursore è arrivato alla fine
// quindi il secondo foreach non stamperà nulla

// foreach ($stmt as $row)
// {
//     echo "<li>$row[name]</li>";
// } 

// foreach ($stmt as $row)
// {
//     echo "<li>$row[name]</li>";
// } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria</title>
</head>
<body>
    <div class="container">
        <ul><?php
            foreach ($stmt as $row) { ?>
                <li>
                    <?= "$row[id] - $row[name] - $row[price]" ?>
                    <a href="/IFOA0124/S1L3-database-mysql-1/2-esercizio/dettagli.php?id=<?= $row['id'] ?>">vai</a>
                    <a href="/IFOA0124/S1L3-database-mysql-1/2-esercizio/elimina.php?id=<?= $row['id'] ?>">elimina</a>
                </li><?php
            } ?>
        </ul>
    </div>
</body>
</html>