<?php

include_once __DIR__ . '/classes/DVD.php';
include_once __DIR__ . '/classes/Libro.php';
include_once __DIR__ . '/classes/MaterialeBibliotecario.php';

$book1 = new Libro('Piccoli principi crescono', 1950, 'Allan Poe');
$book2 = new Libro('Ce la faremo', 2000, 'Allan Poe');
$book3 = new Libro('Evvia la OOP', 2024, 'Allan Poe');
$dvd1 = new DVD('Wow', 1950, 'Allan Poe');
$dvd2 = new DVD('Pinco', 1950, 'Allan Poe');
echo 'Totale: ' . MaterialeBibliotecario::contaMateriali() . '<br>';

$book1->presta();
$dvd1->presta();
$book1->restituisci();
$dvd2->restituisci();
echo 'Totale dopo i giri: ' . MaterialeBibliotecario::contaMateriali() . '<br>';

echo 'Totale libri rimasti: ' . Libro::contaLibri() . '<br>';
echo 'Totale DVD rimasti: ' . DVD::contaDVD() . '<br>';
