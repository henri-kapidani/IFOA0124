<?php
include_once __DIR__ . '/includes/init.php';
if (!$user_from_db) header('Location: /IFOA0124/S2L1-cose-di-php/1-login/login.php');

include_once __DIR__ . '/includes/initial.php';
?>
    <h1>Sono solo per utenti loggati</h1>

<?php
include __DIR__ . '/includes/end.php';
