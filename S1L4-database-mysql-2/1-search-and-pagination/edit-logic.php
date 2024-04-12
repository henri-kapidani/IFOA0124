<?php
include __DIR__ . '/includes/db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$ingredients = $_POST['ingredients'];
$price = $_POST['price'];

$stmt = $pdo->prepare("UPDATE dishes SET name = :name, ingredients = :ingredients, price = :price WHERE id = :id");
$stmt->execute([
    'id' => $id,
    'name' => $name,
    'ingredients' => $ingredients,
    'price' => $price,
]);

header("Location: /IFOA0124/S1L4-database-mysql-2/1-search-and-pagination/index.php");
