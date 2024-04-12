<?php 
include __DIR__ . '/includes/db.php';

$search = $_GET['search'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM dishes WHERE name LIKE ?");
$stmt->execute([
    "%$search%"
]);

include __DIR__ . '/includes/initial.php'; ?>

    <h1 class="text-center">La nostra pizzeria</h1>

    <form class="row g-3">
        <div class="col">
            <input type="text" name="search" class="form-control" placeholder="Cerca una pizza">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Cerca</button>
        </div>
    </form>

    <ul><?php
        foreach ($stmt as $row) { ?>
            <li class="mb-3">
                <?= "$row[id] - $row[name] - $row[price]" ?>
                <a href="/IFOA0124/S1L4-database-mysql-2/1-search-and-pagination/dettagli.php?id=<?= $row['id'] ?>" class="btn btn-primary">Vai</a>
                <a href="/IFOA0124/S1L4-database-mysql-2/1-search-and-pagination/elimina.php?id=<?= $row['id'] ?>" class="btn btn-danger">Elimina</a>
            </li><?php
        } ?>
    </ul>

    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>

            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>

            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div><?php

include __DIR__ . '/includes/end.php';
