<?php
include __DIR__ . '/includes/db.php';

$id = $_GET["id"] ?? null;
$is404 = true;

if ($id) {
    $stmt = $pdo->prepare('SELECT * FROM dishes WHERE id = ?');
    $stmt->execute([$id]);
    $pizza = $stmt->fetch();
    $is404 = !$pizza;
}

include __DIR__ . '/includes/initial.php';

if ($is404) {
    include __DIR__ . '/includes/404.php';
} else { ?>
    <h1><?= $pizza['name'] ?></h1>
    <h2><?= $pizza['price'] ?>€</h2>
    <p><?= $pizza['ingredients'] ?></p><?php
}

include __DIR__ . '/includes/end.php';
