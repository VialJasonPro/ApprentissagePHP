<?php
$title = "Accueil";
require_once "..\Validator.class.php";
require_once "..\controller\sheetFunctions.php";
require_once "..\controller\sheet.php";
?>

<?php ob_start(); ?>

<h2>Votre fiche de personnage :</h2>
<section class="container card">
    <form class="card-body" action="./create.php" method="POST">

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

<?php $content = ob_get_clean(); ?>

<?php require('template\template.php'); ?>