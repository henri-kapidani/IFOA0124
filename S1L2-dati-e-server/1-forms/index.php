<?php
// se ci sono stati inviati dei dati
// allora validarli e fare tutto il resto (tra cui salvare i dati nel database)
// se NON sono validi rimaniamo in questa pagina e ripresentiamo il form all'utente
// se sono validi ridirezionamo l'utente su una pagina diversa con un messaggio di successo

echo '<pre>' . print_r($_POST, true) . '</pre>';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    $errors = [];

    // validare i dati

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email non valida';
    }

    if (strlen($password) < 8) {
        $errors['password'][] = 'Password troppo corta';
    }

    if (true) {
        $errors['password'][] = 'Password non contine numeri';
    }

    // salvarli nel database

    // inviare email

    if ($errors == []) {
        header('Location: /IFOA0124/S1L2-dati-e-server/1-forms/success.php');
    }

    echo '<pre>' . print_r($errors, true) . '</pre>';

} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <form action="" method="post" novalidate>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Username">
        <br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="example@email.com" value="valore precedente">
        <div class="error"><?= $errors['email'] ?? '' ?></div>
        <br>

        <label for="age">Età</label>
        <input type="number" name="age" id="age">
        <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="A secure password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>">
        <div class="error"><?php
            if ($errors['password']) {
                echo '<ul>';
                foreach($errors['password'] as $error) {
                    echo "<li>$error</li>";
                }
                echo '</ul>';
            } ?>
        </div>
        <br>

        <button type="submit">Invia</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>





<?php
$errors = [
    'name' => ['nome troppo corto'],
    'password' => [
        'non ci sono i caratteri',
        'troppo corta',
        'non ci sono i simboli',
    ]
];




$errors = [
    'name' => 'nome troppo corto',
    'password' => 'non ci sono i caratteri',
];