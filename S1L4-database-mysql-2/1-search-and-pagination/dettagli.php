<?php
include __DIR__ . '/includes/db.php';

// SELECT DI TUTTE LE RIGHE
$stmt = $pdo->prepare('SELECT * FROM dishes WHERE id = ?');
$stmt->execute([$_GET["id"]]);

$row = $stmt->fetch();

include __DIR__ . '/includes/initial.php'; ?>

    <h1><?= $row['name'] ?></h1>
    <h2><?= $row['price'] ?>€</h2>
    <p><?= $row['ingredients'] ?></p><?php

include __DIR__ . '/includes/end.php';
