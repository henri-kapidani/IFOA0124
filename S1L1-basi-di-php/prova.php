<?php
    $animali = [
        'mammiferi' => [
            'tigri', 'cani', 'gatti'
        ],
        'uccelli' => ['passerotti', 'cormorani', 'pappagalli'],
        'pesci' => ['salmone', 'trota'],
        'insetti' => ['mosche'],
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Amimali</h1>
    <ul>
        <li>
            Mammiferi
            <ul>
                <li>Tigri</li>
                <li>Cani</li>
                <li>Gatti</li>
            </ul>
        </li>

        <li>
            Uccelli
            <ul>
                <li>Passerotti</li>
                <li>Cormorani</li>
                <li>Pappagalli</li>
            </ul>
        </li>

        <li>
            Pesci
            <ul>
                <li>Salmone</li>
                <li>Trota</li>
            </ul>
        </li>
    </ul>

    <ul><?php
        foreach($animali as $category => $animal_list) { ?>
            <li>
                <?= $category ?>
                <ul><?php
                    foreach ($animal_list as $animal_name) { ?>
                        <li><?= $animal_name ?></li><?php
                    } ?>
                </ul>
            </li><?php
        } ?>
    </ul>
</body>
</html>