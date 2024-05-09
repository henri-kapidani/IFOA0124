<?php

// scrittura
// $file_handle = fopen('files/mytext.txt', 'a+');
// $data = "\nQuesto è dell'atro testo";
// fwrite($file_handle, $data);
// fclose($file_handle);


// file_put_contents('files/mytext.txt', 'questo è da file_put_contents');


// lettura
// $file_name = 'files/mytext.txt';
// if (file_exists($file_name)) {
//     $file_handle = fopen($file_name, 'r');
//     $readData = fread($file_handle, filesize($file_name));
//     echo $readData;
//     fclose($file_handle);
// } else {
//     echo '<h1>Il file non esiste!</h1>';
// }

// $file_name = 'files/mytext.txt';
// if (file_exists($file_name)) {
//     $full_content = file_get_contents($file_name);
//     echo $full_content;
// }

// $data = '';
// for ($i=0; $i < 100; $i++) { 
//     $data .= "$i\n";
// }

// file_put_contents('files/mytext.txt', $data);

// mkdir('cartella2/ciao/bo', 777, true);

// scandir
// is_file
// is_dir
// $dir_name = 'files/';
// $list_directory = scandir($dir_name);
// echo '<pre>' . print_r($list_directory, true) . '</pre>';

// echo '<ul>';
// foreach($list_directory as $resource_name) {
//     if ($resource_name === '.' || $resource_name === '..') continue;

//     if (is_file($dir_name . $resource_name)) {
//         echo "<li>File: $resource_name</li>";
//     }
    
//     if (is_dir($dir_name . $resource_name)) {
//         echo "<li>Cartella: $resource_name</li>";
//     }
// }
// echo '</ul>';

// unlink('files/deleteme.txt'); // elimina un file

// rename('files/prova.txt', 'files/mytext.txt');

// copy('files/mytext.txt', 'files/copia.txt');


// *******************  JSON  ****************************
$pets = [
    [
        'name'  => 'Fufy',
        'type'  => 'cat',
        'age'   => 2
    ],
    [
        'name'  => 'Boby',
        'type'  => 'dog',
        'age'   => 7
    ],
    [
        'name'  => 'Susy',
        'type'  => 'cat',
        'age'   => 3
    ],
];

// // write JSON
// $myJson = json_encode($pets, JSON_PRETTY_PRINT);
// echo $myJson;
// file_put_contents('files/pets.json', $myJson);

// read JSON
// $data_string = file_get_contents('files/pets.json');
// $data = json_decode($data_string, true);
// // var_dump($data);
// echo '<pre>' . print_r($data, true) . '</pre>';


// *******************  CSV  ****************************
/*
name,type,age
Fufy,cat,2
Boby,dog,7
Susy,cat,3
*/
$file_name = 'files/pets.csv';
$file_handle = fopen($file_name, 'w');

fputcsv($file_handle, array_keys($pets[0]));
foreach($pets as $index => $row) {
    // if ($index === 0) fputcsv($file_handle, array_keys($row));
    fputcsv($file_handle, $row);
}
fclose($file_handle);
