<?php
include_once __DIR__ . '/includes/init.php';
if ($user_from_db) header('Location: /IFOA0124/S2L1-cose-di-php/1-login/');

$user = [];
$user['username'] = $_POST['username'] ?? '';
$user['password'] = $_POST['password'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {   
    $stmt = $pdo->prepare("
        SELECT * FROM users
        WHERE username = :username;
    ");

    $stmt->execute([
        'username' => $_POST['username'],
    ]);

    $user_from_db = $stmt->fetch();

    // verificare che c'è una riga risultante
    if ($user_from_db) {
        // confrontare gli hash
        if (password_verify($_POST['password'], $user_from_db["password"])) {
            // se gli hash coincidono => utente loggato, altrimenti errore
            $_SESSION['user_id'] = $user_from_db['id'];
            // TODO: non arriva qui sotto
            header('Location: /IFOA0124/S2L1-cose-di-php/1-login/'); exit;
        };
    }

    // popolare l'array degli errori
    $errors['credentials'] = 'Credenziali non valide';
}

include_once __DIR__ . '/includes/initial.php'; ?>

    <h1>Login</h1>
    <form action="" method="POST" novalidate>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

<?php
include __DIR__ . '/includes/end.php';
