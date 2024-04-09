<?php
$squadre_serieA = [
    "AS Roma" => [
        "Portiere" => "99.Svilar",
        "Difensore" => "2.Karsdorp 13.Mancini 5.Ndicka 3.Angelino",
        "Centrocampista" => "7.Pellegrini 16.Paredes 8.Cristante",
        "Attaccante" => "90.Lukaku 21.Dybala"
    ],
    "Real Madrid" => [
        "Portiere" => "1.Lunin",
        "Difensore" => "3.Mendy 2.Rudiger 13.Nacho 22.Carvajal",
        "Centrocampista" => "8.Kroos 10.Modric 14.Valverde",
        "Attaccante" => "7.Vinicius 9.Rodrygo"
    ],
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0">
    <title>Squadre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
</head>
<body>
    <h1>Formazioni</h1>
    
    <ul><?php
        foreach ($squadre_serieA as $team_name => $players) { ?>
            <li>
                <h2><?= $team_name ?></h2>
                <ul><?php
                    foreach ($players as $role => $players_names) {
                        echo "<li><strong>$role</strong>: $players_names</li>";
                    } ?>
                </ul>
            </li><?php
        } ?>
    </ul>
</body>
</html>