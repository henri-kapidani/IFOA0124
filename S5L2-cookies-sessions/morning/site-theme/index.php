<?php
require_once __DIR__ . '/includes/header.php';

$sql = "SELECT id, title_$language AS title, content_$language AS content FROM posts";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$posts = $stmt->fetchAll();
?>

    <h1>Homepage</h1>
    <ul><?php

        foreach($posts as $post) { ?>
            <li><?= $post['title'] ?></li><?php
        } ?>

    </ul><?php   

require_once __DIR__ . '/includes/footer.php';
