<?php
session_start();
// verifica se esiste già una sessione (cioè se l'utente ha passato un session id valido)
// se esiste la sessione usa il file esistente
// altrimenti
// crea il file per una nuova sessione
// viene settato un cookie di nome PHPSESSID e come valore il nome del file creato
$_SESSION['user_id'] = 1; // dato sensibile, ideale per le sessioni
$_SESSION['language'] = 'it'; // dato non sensibile, meglio usare un cookie
// setcookie('language', 'it');

if (isset($_SESSION['user_id'])) {
    echo "Sei l'utente " . $_SESSION['user_id'];
};

echo '<br>';

echo session_id();
