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

$pdo = new PDO($dsn, $user, $pass, $options);

$search = $_GET['search'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM dishes WHERE name LIKE ?");
$stmt->execute([
    "%$search%"
]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
</head>

<body>
    <div class="container">
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
                    <a href="/IFOA0124/S1L3-database-mysql-1/2-esercizio/dettagli.php?id=<?= $row['id'] ?>" class="btn btn-primary">Vai</a>
                    <a href="/IFOA0124/S1L3-database-mysql-1/2-esercizio/elimina.php?id=<?= $row['id'] ?>" class="btn btn-danger">Elimina</a>
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
    </div>
</body>

</html>