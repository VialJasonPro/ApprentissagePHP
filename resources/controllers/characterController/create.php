<?php
/**
 * Paramètres du formulaire
 * 
 * ---------------------------------------------------------------------------
 * $characterName -> Nom du personnage -> Texte
 * $characterAge -> Age du personnage -> Nombre
 * $characterState -> État du personnage (Vivant / Mort / Blessé) -> Liste
 * $characterProfession -> Travail du personnage -> Radio
 * $characterPersonalities -> Personnalité du personnage -> Checbox (Tableau)
 * ---------------------------------------------------------------------------
 * $stateList -> Liste des États du personnage -> Tableau
 * $personalityList -> Liste des personnalités -> Tableau
 * $professionList -> Liste des mêtiers -> Tableau
 * ---------------------------------------------------------------------------
 */


$characterName = (isset($_POST["characterName"])) ? $_POST["characterName"] :"";
$characterAge = (isset($_POST["characterAge"])) ? $_POST["characterAge"] :"";
$characterState = (isset($_POST["characterState"])) ? $_POST["characterState"] :"";
$characterProfession = (isset($_POST["characterProfession"])) ? $_POST["characterProfession"] :"";
$characterPersonalities = (isset($_POST["characterPersonalities"])) ? $_POST["characterPersonalities"] :[];
$errors = [];

$stateList = [
    "alive" => "Vivant",
    "dead"  => "Mort",
    "injured" => "Blessé",
];

$personnalityList = [
    "stingy" => "Avare",
    "nice"   => "Gentil",
    "bad"    => "Méchant",
    "psycho" => "Psychopathe",
];

$professionList = [
    "farmer" => "Fermier",
    "knight" => "Chevalier",
    "warrior"=> "Guerrier",
    "barbarian"=> "Barbare",
    "wizard" => "Magicien",
    "marchant" => "Marchand",
];

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $characterNameErrors = Validator::validate($characterName,["required", "minLength:3", "maxLength:15"]);
    $characterAgeErrors = Validator::validate((float)$characterAge,["required", "min:0", "max:250"]);
    $characterStateErrors = Validator::validate($characterState, ["required", "isIn:" . implode(",", $stateList)]);
    $characterProfessionErrors = Validator::validate($characterProfession, ["required", "isIn:" . implode(",", $professionList)]);
    $characterPersonalitiesErrors = Validator::validate($characterPersonalities, ["required", "isIn:" . implode(",", $personnalityList)]);
    $errors = array_merge($characterNameErrors, $characterAgeErrors, $characterStateErrors, $characterProfessionErrors, $characterPersonalitiesErrors );
}
