<?php

// database dammi l'array
// recuperare i dati inviati dal client così se sono formattati come query string
// username=pippo&password=asdf
// caso più comune quando si invia il form con la funzionalità di default del browser
// $username = $_POST['username'] ?? '';
// $password = $_POST['password'] ?? '';

// recuperare i dati inviati dal client così se sono formattati come JSON
// {"username":"pinco","password":"asdf"}
// caso più comune quando la richiesta viene fatta da fetch oppure axios in javascript
$json = file_get_contents('php://input');
$data = json_decode($json, true);
$username = $data['username'];
$password = $data['password'];

// validazioni e sanitizzazione di tutti i campi

// aggiungere i dati al database
// codice che crea un ordine

header('Content-type: application/json');
echo json_encode([
    'data' => [
        'success' => true,
        'errors' => [],
        'username' => $username,
        'password' => $password
    ]
]);

