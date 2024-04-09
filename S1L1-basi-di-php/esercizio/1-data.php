<?php
    $italian_days = [
        'Domenica',
        'Lunedì',
        'Martedì',
        'Mercoledì',
        'Giovedì',
        'Venerdì',
        'Sabato',    
    ];

    $num_month = date('n');
    switch ($num_month) {
        case '1':
            $month_ita = "gennaio";
            break;
        case '2':
            $month_ita = "febbraio";
            break;
        case '3':
            $month_ita = "marzo";
            break;
        case '4':
            $month_ita = "aprile";
            break;
        case '5':
            $month_ita = "maggio";
            break;
        case '6':
            $month_ita = "giugno";
            break;
        case '7':
            $month_ita = "luglio";
            break;
        case '8':
            $month_ita = "agosto";
            break;
        case '9':
            $month_ita = "settembre";
            break;
        case '10':
            $month_ita = "ottobre";
            break;
        case '11':
            $month_ita = "novembre";
            break;
        case '12':
            $month_ita = "dicembre";
            break;
    }

    $day_ita = $italian_days[date('w')];
    $day_num = date('j'); // numero del giorno senza zeri iniziali
    // $month_ita = "";
    $year = date('Y'); // anno con 4 cifre
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data in italiano</title>
</head>
<body>
    <h1><?= "$day_ita, $day_num $month_ita $year" ?></h1>
</body>
</html>