<?php
include_once __DIR__ . '/constants.php';
include_once __DIR__ . '/translations.php';
include_once __DIR__ . '/db.php';

// echo '<pre>' . print_r($_SERVER, true) . '</pre>'; exit;

// cambiare tema
$cookie_expiration = time() + 60 * 60 * 24 * 365 * 10;
if(isset($_GET['changetheme'])) {
    if (!isset($_COOKIE['theme'])) {
        setcookie('theme', 'light', $cookie_expiration);
    } else {
        setcookie('theme', $_COOKIE['theme'] === 'light' ? 'dark' : 'light', $cookie_expiration);
    }
    header("Location: $_SERVER[HTTP_REFERER]");
    exit;
}

// determinare il tema settato nel cookie
if (!isset($_COOKIE['theme'])) {
    setcookie('theme', 'light', $cookie_expiration);
    $isLight = true;
} else {
    $isLight = $_COOKIE['theme'] === 'light' ? true : false;
}

// determinare la lingua scelta nel cookie
if (!isset($_COOKIE['language']) || !in_array($_COOKIE['language'], $site_languages)) {
    setcookie('language', 'it', $cookie_expiration);
    $language = 'it';
} else {
    $language = $_COOKIE['language']; 
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/<?= $isLight ? 'style.light.css' : 'style.dark.css' ?>" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"
    defer></script>
    <script src="assets/scripts.js" defer></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= SITE_URL ?>"><?= $labels[$language]['site_name'] ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= SITE_URL . '/contacts.php' ?>">Contact</a>
                    </li>
                </ul>
                <a href="?changetheme" class="btn btn-primary">Change theme</a>
                <form id="change-language" action="<?= SITE_URL . '/change-language.php' ?>" method="get">
                    <select name="language" id="select-language">
                        <option value="it"<?= $language === 'it' ? ' selected' : '' ?>>IT</option>
                        <option value="en"<?= $language === 'en' ? ' selected' : '' ?>>EN</option>
                        <option value="fr"<?= $language === 'fr' ? ' selected' : '' ?>>FR</option>
                    </select>
                    <!-- <button>change</button> -->
                </form>
            </div>
        </div>
    </nav>
    <div class="container">