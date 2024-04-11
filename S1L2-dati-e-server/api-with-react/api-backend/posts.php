<?php
// questi sarrano dati presi da un database
$posts = [
    [
        'title' => 'Ciao a tutti',
        'author' => 'Pinco',
        'category' => 'coding',
        'rating' => 10,
    ],
    [
        'title' => 'Ciao mondo',
        'author' => 'Rossi',
        'category' => 'cucina',
        'rating' => 7,
    ],
    [
        'title' => 'mondo e basta',
        'author' => 'Pallino',
        'category' => 'politica',
        'rating' => 4,
    ],
];

header('Content-type: application/json');
echo json_encode($posts);
