<?php
include_once __DIR__ . '/db.php';

// echo '<pre>' . print_r($_FILES, true) . '</pre>'; exit;

// move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], 'files/import.csv');
// $file_name = 'files/import.csv';

if (isset($_FILES["uploaded_file"]) && $_FILES["uploaded_file"]["type"] === 'text/csv' && $_FILES["uploaded_file"]["size"] < 360) {
    $file_name = $_FILES["uploaded_file"]["tmp_name"];
    if ($file_handle = fopen($file_name, "r")) {
        fgetcsv($file_handle);
        while ($data = fgetcsv($file_handle)) {
            // verificare se email è già inserita
            // fare validazioni
            $stmt = $pdo->prepare("
                INSERT INTO users
                (username, email, password, image)
                VALUES
                (:username, :email, :password, :image)"
            );
            $stmt->execute([
                'username' => $data[1],
                'email' => $data[2] ?: null,
                'password' => $data[3] ?: null,
                'image' => $data[4] ?: null,
            ]);
        }
        fclose($file_handle);
    }
} else {
    echo 'File CSV non caricato';
}


$uploads_dir = 'uploads/';
$extension = strtolower(pathinfo($_FILES["profile_image"]["name"], PATHINFO_EXTENSION));
if (isset($_FILES["profile_image"]) && explode('/', $_FILES["profile_image"]["type"])[0] === 'image' && $_FILES["profile_image"]["size"] < 1024 * 1024) {
    $new_name = rand(100000, 9999999) . '.' . $extension;
    // $new_name = '1393922.png';
    $dir_list = scandir($uploads_dir);
    while (true) {
        // verificare se il nome nuovo con l'estensione esiste già
        // se non esiste già usalo
        // altrimenti creare uno nuovo
        if (!in_array($new_name, $dir_list)) break;
        $new_name = rand(100000, 9999999) . '.' . $extension;
    }

    // copiare l'immagine nella cartella delle immagini
    move_uploaded_file($_FILES["profile_image"]["tmp_name"], $uploads_dir . $new_name);

    // caricare nel database il nome dell'immagine     
} else {
    echo 'Immagine non caricata';
}













/*
 verificare se email è già inserita
            // fare validazioni
            $stmt = $pdo->prepare("
                INSERT INTO users
                (username, email, password, image)
                VALUES
                (:username, :email, :password, :image)"
            );
            $stmt->execute([
                'username' => $data[1],
                'email' => $data[2] ?: null,
                'password' => $data[3] ?: null,
                'image' => $data[4] ?: null,
            ]);
            */