<?php
// PHP è un linguaggio INTERPRETATO - COMPILATO

// INTERPRETATI: js, php, python, bash
// COMPILATI: C, C++
// SEMICOMPILATI: JAVA, C#, KOTLIN 
/*
echo "ciao";
// require "ciao" //riga con errore catturato in fase di esecuzione
echo "arrivederci";
*/

// variabili SUPER GLOBALI
// variabili GLOBALI
// variabili LOCALI (alle funzioni)


$my_var = "ciao"; // variabile globale

function saluta($str, $termination) {
    // di default la funzione ha accesso solo alle variabili dichiarate al suo interno

    // global $my_var;
    // echo $my_var;

    // echo $GLOBALS['my_var'];

    // global $saluto;
    // $saluto = 'dalla funzione';

    echo $str . $termination;
}

// saluta(termination: '-', str: 'buongiorno');
// echo $saluto;


// passaggio argomenti alle funzioni
// puo' avvenire per reference oppure per value

function operate_on_arr($array) {
    $array[] = 20;
    var_dump($array);
}

$arrOut = [1, 5, 7, 10];
operate_on_arr($arrOut);
echo '<br>';
var_dump($arrOut);


// function modify(&$num) {
//     $num = $num * 2;
//     var_dump($num);
// }

// $numOut = 5;
// modify($numOut); // 10
// echo '<br>';
// var_dump($numOut); // 5



// function operate_on_arr(arrFunc) {
//     arrFunc.push(20);
//     console.log(arrFunc);
// }

// arrOut = [1, 5, 7, 10];
// operate_on_arr(arrOut);
// console.log(arrOut);