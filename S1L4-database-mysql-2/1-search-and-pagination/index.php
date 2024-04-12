<?php 
include __DIR__ . '/includes/db.php';

$search = $_GET['search'] ?? '';

/*
    1 2 // pagina 1
    3 4 // pagina 2
    5 6 // pagina 3
    7 8 // pagina 4
*/
$page = $_GET['page'] ?? 1; // numero della pagina
$per_page = $_GET['per_page'] ?? 2; // è possibile definire quanti elementi ci saranno per pagina
$per_page = $per_page > 10 ? 2 : $per_page; // limito gli elementi per pagina

$offset = ($page - 1) * $per_page;

$stmt = $pdo->prepare("SELECT * FROM dishes WHERE name LIKE :search LIMIT :per_page OFFSET :offset");
$stmt->execute([
    'search' => "%$search%",
    'offset' => $offset,
    'per_page' => $per_page,
]);
$pizzas = $stmt->fetchAll();

// $num_pizzas = $pdo->query('SELECT COUNT(*) AS num_pizzas FROM dishes')->fetch()['num_pizzas'];
$stmt = $pdo->prepare('SELECT COUNT(*) AS num_pizzas FROM dishes WHERE name LIKE :search');
$stmt->execute([
    'search' => "%$search%",
]);
$num_pizzas = $stmt->fetch()['num_pizzas'];
$tot_pages = ceil($num_pizzas / $per_page);

include __DIR__ . '/includes/initial.php'; ?>

    <h1 class="text-center">La nostra pizzeria</h1>

    <form class="row g-3">
        <div class="col">
            <input type="text" name="search" class="form-control" placeholder="Cerca una pizza" value="<?= $search ?>">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Cerca</button>
        </div>
    </form>

    <ul><?php
        foreach ($pizzas as $row) { ?>
            <li class="mb-3">
                <?= "$row[id] - $row[name] - $row[price]" ?>
                <a href="/IFOA0124/S1L4-database-mysql-2/1-search-and-pagination/dettagli.php?id=<?= $row['id'] ?>" class="btn btn-primary">Vai</a>
                <a href="/IFOA0124/S1L4-database-mysql-2/1-search-and-pagination/elimina.php?id=<?= $row['id'] ?>" class="btn btn-danger">Elimina</a>
                <a href="/IFOA0124/S1L4-database-mysql-2/1-search-and-pagination/edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
            </li><?php
        } ?>
    </ul>

    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item<?= $page == 1 ? ' disabled' : '' ?>">
                <a
                    class="page-link"
                    href="/IFOA0124/S1L4-database-mysql-2/1-search-and-pagination/?page=<?= $page - 1 ?><?= $search ? "&search=$search" : '' ?>"
                >Previous</a>
            </li><?php

                for ($i=1; $i <= $tot_pages; $i++) { ?>
                    <li class="page-item<?= $page == $i ? ' active': '' ?>">
                        <a
                            class="page-link"
                            href="/IFOA0124/S1L4-database-mysql-2/1-search-and-pagination/?page=<?= $i ?><?= $search ? "&search=$search" : '' ?>"
                        ><?= $i ?></a>
                    </li><?php
                } ?>
            
            <li class="page-item<?= $page == $tot_pages ? ' disabled' : '' ?>">
                <a
                    class="page-link"
                    href="/IFOA0124/S1L4-database-mysql-2/1-search-and-pagination/?page=<?= $page + 1 ?><?= $search ? "&search=$search" : '' ?>"
                >Next</a>
            </li>
        </ul>
    </nav>
</div><?php

include __DIR__ . '/includes/end.php';
