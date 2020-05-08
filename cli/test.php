<?php
$fichier = __DIR__  . DIRECTORY_SEPARATOR . "eContactSave.csv";
$resource = fopen($fichier, "r");
$k = 0;
while ($line = fgets($resource)){
    $k++;
    if ($k == 19) {
        echo $line;
        break;
    }
}
fclose($resource);