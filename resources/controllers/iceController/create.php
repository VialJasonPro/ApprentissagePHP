<?php


//Checkbox
$parfums = [
    "Fraise" => 4,
    "Chocolat" => 5,
    "Vanille" => 3
];
//Radio
$cornets = [
    "Pot" => 2,
    "Cornet" => 3
];
// Checkbox
$supplements = [
    "Pépites de chocolat" => 1,
    "Chantilliy" => 0.5
];
$title = "Composez votre glace";
$ingredients = [];
$total = 0;


if (isset($_GET['parfum'])) {
    foreach($_GET['parfum'] as $parfum) {
        if(isset($parfums[$parfum])){
            $ingredients[] = $parfum;
            $total += $parfums[$parfum];
        }
    }
}

if (isset($_GET['supplement'])) {
    foreach($_GET['supplement'] as $supplement) {
        if(isset($supplements[$supplement])){
            $ingredients[] = $supplement;
            $total += $supplements[$supplement];
        }
    }
}

if (isset($_GET['cornet'])) {
    $cornet = $_GET['cornet'];
    if(isset($cornets[$cornet])){
        $ingredients[] = $cornet;
        $total += $cornets[$cornet];
    }    
}