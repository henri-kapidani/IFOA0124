<?php 
include __DIR__ . '/includes/db.php';

$id = $_GET['id'] ?? null;
$is404 = true;

if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM dishes WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $pizza = $stmt->fetch();
    $is404 = !$pizza;
}

include __DIR__ . '/includes/initial.php';

if ($is404) {
    include __DIR__ . '/includes/404.php';
} else { ?>
    <h1 class="text-center">Edit</h1>

    <form action="/IFOA0124/S1L4-database-mysql-2/1-search-and-pagination/edit-logic.php" method="POST" novalidate>
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $pizza['name'] ?>">
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredienti</label>
            <input type="text" class="form-control" id="ingredients" name="ingredients" value="<?= $pizza['ingredients'] ?>">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="price" name="price" value="<?= $pizza['price'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Modifica</button>
    </form><?php
} 

include __DIR__ . '/includes/end.php';
