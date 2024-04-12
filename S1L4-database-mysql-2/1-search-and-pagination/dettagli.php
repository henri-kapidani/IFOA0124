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
$stmt = $pdo->prepare('SELECT * FROM dishes WHERE id = ?');
$stmt->execute([$_GET["id"]]);

$row = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettagli pizza</title>
</head>
<body>
    <h1><?= $row['name'] ?></h1>
    <h2><?= $row['price'] ?>€</h2>
    <p><?= $row['ingredients'] ?></p>
</body>
</html>
