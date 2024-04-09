<?php
/*
Tags di php:
<?php
    .......codice...........
?>

<?= valore ?>
corrisponde a
<?php echo valore ?>
*/

// punti e virgola obbligatori
// considerate php case sensitive (anche se non lo è per intero)

// le variabili iniziano con il dollaro (obbligatorio)
// per definire le stringhe si possono usare ' oppure " (non `)
$greet = 'ciao a tutti';
$number = 5;
$float_num = 5.6;
$bool = true;
$null_value = NULL;
// e possono cambiare tipo
$greet = 10;
// usare una variabile non definita in precedenza produce un warning

// echo stampa il valore in HTML
echo $greet;

// costanti (una volta definite il loro valore non puo' essere cambiato)
// è una convenzione scriverle in maiuscolo
define('NUM', 10);
const FRUIT = "mele";

// l'peratore . concatena le stringhe
echo '<br>Ho ' . NUM . ' ' . FRUIT;

// in una stringa tra " " si possono interpolare le variabili (ma NON le costanti)
echo "<br>Ho $number di mele";


// https://www.php.net/manual/en/language.control-structures.php

// -----------------------------------------------------------------------------------
// IF
// -----------------------------------------------------------------------------------
/*
VALORI FALSY:
- the boolean false itself
- the integer 0 (zero)
- the floats 0.0 and -0.0 (zero)
- the empty string "", and the string "0" !!!!
!!!- an array with zero elements []
- the unit type NULL (including unset variables)
*/

$quantity = 10;
echo '<br>';

// if ($quantity > 5) {
//     echo "$quantity è maggiore di 5";
// } elseif ($quantity < 5) {
//     echo "$quantity è minore di 5";
// } else {
//     echo "$quantity è uguale a 5";
// }

if ($quantity > 5) :
    echo "$quantity è maggiore di 5";
elseif ($quantity < 5) :
    echo "$quantity è minore di 5";
else :
    echo "$quantity è uguale a 5";
endif;

// -----------------------------------------------------------------------------------
// SWITCH
// -----------------------------------------------------------------------------------
$option = 2;
echo '<br><br>';

switch ($option) {
    case 1:
        echo 'Opzione 1 (saluta) selezionata';
        break;

    case 2:
        echo 'Opzione 2 (mangia) selezionata';
        break;

    case 3:
        echo 'Opzione 3 (cammina) selezionata';
        break;

    default:
        echo 'Opzione non riconosciuta';
        break;
}

// -----------------------------------------------------------------------------------
// TERNARIO
// -----------------------------------------------------------------------------------
echo '<br>';
$variabile = 'ciao';

echo '<br>';
echo '<br>', $variabile ? "valore truthy" : 'valore falsy';

echo '<br>';
echo '<br>', $variabile ?: 'valore falsy';
// equivale a:
echo '<br>', $variabile ? $variabile : 'valore falsy';

echo '<br>';
echo '<br>', $variabile ?? 'variabile not definita';
// equivale a:
echo '<br>', isset($variabile) ? $variabile : 'variabile not definita';

echo '<br>';
$altra_var = 0;
$altra_var ??= "valore di default";
// equivale a
// $altra_var = $altra_var ?? "valore di default";
echo '<br>', $altra_var;

// -----------------------------------------------------------------------------------
// ARRAY
// -----------------------------------------------------------------------------------

// forma equivalente più vecchia
/*
$languages = array(
    'php',
    'javascript',
    'python',
    'lisp',
);
*/

$languages = [
    1 => 'php',
    100 => 'javascript',
    20 => 'python',
    3 => 'lisp',
];

// echo $languages; // non va con gli array
echo '<pre>';
// var_dump($languages);
print_r($languages);
echo '</pre>';

$languages = [
    'first' => 'php',
    'javascript',
    'python',
    'lisp',
];

$languages[] = 'Java';



// unset($languages[2]);

echo '<pre>';
// var_dump($languages);
print_r($languages);
echo '</pre>';

// print_r($languages[count($languages) - 1]);
print_r($languages[0]);

print_r(count($languages));

echo '<ul>';
for($i = 0; $i < count($languages); $i++) {
    echo "<li>$languages[$i]</li>";
}
echo '</ul>';

foreach ($languages as $chiave => $valore) {
    $sondentro = "definito nel foreach";
    echo "<li>$chiave ---- $valore</li>";
}

echo $sondentro;

$condizione = false;

while ($condizione) {
    // cose da fare
}

do {
    // cose da fare
} while ($condizione);

var_dump(1 == '1'); // true
var_dump(1 === '1'); // false



$arr = [
    'mammiferi' => [
        'tigri', 'cani', 'gatti'
    ],
    'uccelli' => ['passerotti', 'cormorani', 'pappagalli'],
    'pesci' => ['salmone', 'trota'],
];


// in JS
// {
//     nome: 'pinco',
//     eta: 30,
//     colori: [
//         'verde',
//         'giallo'
//     ]
// }

// in php
[
    'nome' => 'pinco',
    'eta' => 30,
    'colori' => [
        'verde',
        'giallo'
    ]
];
