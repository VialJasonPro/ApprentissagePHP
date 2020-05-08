<section class="container-fluid">
    <div class="card">
        <div class="card-body bg-dark text-white">
            <h5 class="card-title" ><?= $characterName ?></h5>
        </div>
        <ul class="list-group">
            <li class="list-group-item bg-light"><strong>Age</strong> : <?= $characterAge ?> ans</li>
            <li class="list-group-item"><strong>État</strong> : <?= $characterState ?></li>
            <li class="list-group-item bg-light"><strong>Profession</strong> : <?= $characterProfession ?></li>
            <li class="list-group-item"><strong>Personnalité(s)</strong> : <?= implode("; " , $characterPersonalities)  ?></li>
        </ul>
    </div>
</section>