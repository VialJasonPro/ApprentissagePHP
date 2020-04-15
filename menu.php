<?php
function nav_item(string $lien, string $title): string
{

    $classe = "nav-item";
    if ($_SERVER['SCRIPT_NAME'] === $lien) {
        $classe = $classe . ' active';
    }
    return '<li class="' . $classe .'">
        <a class="nav-link" href="'. $lien .'">' . $title . '<a>
        </li>';
    
}
?>

<?= nav_item("/index.php", "Accueil"); ?>
<?= nav_item("/contact.php", "Contact"); ?>s