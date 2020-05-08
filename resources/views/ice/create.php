<?php
require_once '..\controller\functions.php';
require_once '..\controller\iceGenerator.php';
ob_start();
?>

<h1>Composez votre glace</h1>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Votre glace</h5>
                <ul>
                    <?php foreach($ingredients as $ingredients): ?>
                        <li><?= $ingredients ?></li>
                    <?php endforeach; ?>
                </ul>
                <p>
                    <strong>Prix : </strong> <?= $total ?> CHF
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <form action="./iceGeneratorView.php" method="GET">
            <h2>Choisissez vos parfums</h2>
            <?php foreach($parfums as $parfum => $prix) : ?>
                <div class="checkbox">
                    <label >
                        <?=  checkbox('parfum', $parfum, $_GET) ?>
                        <?= $parfum ?> - <?= $prix ?> CHF
                    </label>
                </div>
            <?php endforeach; ?>
            <h2>Choisissez votre cornet</h2>
            <?php foreach($cornets as $cornet => $prix) : ?>
                <div class="checkbox">
                    <label>
                        <?=  radio('cornet', $cornet, $_GET) ?>
                        <?= $cornet ?> - <?= $prix ?> CHF
                    </label>
                </div>
            <?php endforeach; ?>


            <h2>Choisissez vos suppléments</h2>
            <?php foreach($supplements as $supplement => $prix) : ?>
                <div class="checkbox">
                    <label>
                        <?=  checkbox('supplement', $supplement, $_GET) ?>
                        <?= $supplement ?> - <?= $prix ?> CHF
                    </label>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary">Composer ma glace</button>

            
        </form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template\template.php'); ?>
