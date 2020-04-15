<!--LOGIC-->
<?php
$title = "Accueil";
require_once "Validator.class.php";
require "header.php";
require_once "sheetFunctions.php";
require_once "functions.php";

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

?>
<!--END LOGIC-->
<!--HTML-->

<h2>Votre fiche de personnage :</h2>
<section class="container card">
    <form class="card-body" action="/sheet.php" method="POST">

        <div class="form-group">

            <label for="characterName"><h3>Nom du personnage</h3></label>

            <input type="text" class="form-control <?php if(!empty($characterNameErrors)):?>
            is-invalid<?php endif; ?>" id="characterName" 
            placeholder="Entrer le nom" name="characterName" required value=<?= htmlentities($characterName)?>>

            <?php if (!empty($characterNameErrors)): ?>
                <div class="invalid-feedback">
                    <strong>Entré invalide !</strong><br>
                    <?= implode("<br>",$characterNameErrors) ?>
                </div>    
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="characterAge"><h3>Age du personnage</h3></label>
            <input type="number" class="form-control <?php if(!empty($characterAgeErrors)):?>
            is-invalid<?php endif; ?>" id="characterAge" 
            placeholder="Entrer l'age" name="characterAge" required value=<?= htmlentities($characterAge)?>>

            <?php if (!empty($characterAgeErrors)): ?>
                <div class="invalid-feedback">
                    <strong>Entré invalide !</strong><br>
                    <?= implode("<br>",$characterAgeErrors) ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="characterState"><h3>État du personnage</h3></label>

            <select class="form-control <?php if(!empty($characterStateErrors)):?>
            is-invalid<?php endif; ?>" id="characterState" name="characterState" required>
                <?php displayListElementsSelect($stateList, $characterState) ?>
            </select>

            <?php if (!empty($characterStateErrors)): ?>
                <div class="invalid-feedback">
                    <strong>Entré invalide !</strong><br>
                    <?= implode("<br>",$characterStateErrors) ?>
                </div>
            <?php endif; ?>
        </div>

        <h3>Métier du personnage</h3>
        
        <div class="form-check <?php if(!empty($characterProfessionErrors)):?>
            is-invalid<?php endif; ?>">
            <?php displayListElementsRadio($professionList, "characterProfession", $characterProfession) ?>
        </div>

        <?php if (!empty($characterProfessionErrors)): ?>
                <div class="invalid-feedback">
                    <strong>Entré invalide !</strong><br>
                    <?= implode("<br>",$characterProfessionErrors) ?>
                </div>
        <?php endif; ?>

        <h3>Personnalité du personnage</h3>
        <div class="form-check <?php if(!empty($characterPersonalitiesErrors)):?>
            is-invalid<?php endif; ?>">

            <?php displayListElementsCheckbox($personnalityList, "characterPersonalities", $characterPersonalities)?>
        </div>

        <?php if (!empty($characterPersonalitiesErrors)): ?>
                <div class="invalid-feedback">
                    <strong>Entré invalide !</strong><br>
                    <?= implode("<br>",$characterPersonalitiesErrors) ?>
                </div>
        <?php endif; ?>

        <br>
        <button type="submit" class="btn btn-dark">Envoyer</button>
    </form>
</section>
<br>




<?php if($_SERVER['REQUEST_METHOD'] == 'POST'):?>
    <?php if(empty($errors)):?>
        <section class="container-fluid">
            <div class="card">
                <div class="card-body bg-dark text-white">
                    <h5 class="card-title" ><?= $characterName ?></h5>
                </div>
                <ul class="list-group">
                    <li class="list-group-item bg-light"><strong>Age</strong> : <?= $characterAge ?></li>
                    <li class="list-group-item"><strong>État</strong> : <?= $characterState ?></li>
                    <li class="list-group-item bg-light"><strong>Profession</strong> : <?= $characterProfession ?></li>
                    <li class="list-group-item"><strong>Personnalité(s)</strong> : <?= implode("; " , $characterPersonalities)  ?></li>
                </ul>
            </div>
        </section>
    <?php endif ?>
<?php endif ?>



<br>
<h2>$_GET</h2>
<pre>
    <?php var_dump($_GET) ?>
</pre>

<h2>$_POST</h2>
<pre>
    <?php var_dump($_POST) ?>
</pre>


<?php require "footer.php";?>
<!--END HTML-->