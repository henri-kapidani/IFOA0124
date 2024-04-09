<?php
    $matches = [
        [
            'info' => [
                'date' => '20/12/2023',
                'place' => 'Rome'
            ],
            'team1' => [
                'name' => 'AS Roma',
                'formation' => [
                    "Portiere" => "99.Svilar",
                    "Difensore" => "2.Karsdorp 13.Mancini 5.Ndicka 3.Angelino",
                    "Centrocampista" => "7.Pellegrini 16.Paredes 8.Cristante",
                    "Attaccante" => "90.Lukaku 21.Dybala"
                ]
            ],
            'team2' => [
                'name' => 'Real Madrid',
                'formation' => [
                    "Portiere" => "1.Lunin",
                    "Difensore" => "3.Mendy 2.Rudiger 13.Nacho 22.Carvajal",
                    "Centrocampista" => "8.Kroos 10.Modric 14.Valverde",
                    "Attaccante" => "7.Vinicius 9.Rodrygo"
                ]
            ]
        ],

        [
            'info' => [
                'date' => '1/6/2023',
                'place' => 'Milano'
            ],
            'team1' => [
                'name' => 'Lecce',
                'formation' => [
                    "Portiere" => "99.Svilar",
                    "Difensore" => "2.Karsdorp 13.Mancini 5.Ndicka 3.Angelino",
                    "Centrocampista" => "7.Pellegrini 16.Paredes 8.Cristante",
                    "Attaccante" => "90.Lukaku 21.Dybala"
                ]
            ],
            'team2' => [
                'name' => 'Bari',
                'formation' => [
                    "Portiere" => "1.Lunin",
                    "Difensore" => "3.Mendy 2.Rudiger 13.Nacho 22.Carvajal",
                    "Centrocampista" => "8.Kroos 10.Modric 14.Valverde",
                    "Attaccante" => "7.Vinicius 9.Rodrygo"
                ]
            ]
        ],
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campionato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
</head>
<body>
    <h1 class="text-center">Campionato</h1>
    <div class="container"><?php
        foreach ($matches as $match) { ?>
            <h2 class="text-center"><?php echo $match['info']['date'] . ' - ' . $match['info']['place'] ?></h2>
            <div class="row g-3 row-cols-1 row-cols-sm-2">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $match['team1']['name'] ?></h5>
                            <ul><?php
                                foreach ($match['team1']['formation'] as $role => $players_names) {
                                    echo "<li><strong>$role</strong>: $players_names</li>";
                                } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $match['team2']['name'] ?></h5>
                            <ul><?php
                                foreach ($match['team2']['formation'] as $role => $players_names) {
                                    echo "<li><strong>$role</strong>: $players_names</li>";
                                } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><?php
        } ?>
    </div>
</body>
</html>