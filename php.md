# GUIDE PHP

- **Hypertext Preprocessor**
- Language principalement utilisé pour produire des pages web dynamiques via un server HTTP. C'est un language impératif orienté objet.
- **Typage** : Dynamique / Faible<br>
  
Le typage dynamique consiste à laisser l'ordinateur réaliser cette opération de typage « à la volée », lors de l'exécution du code, contrairement à certains langages statiquement typés qui demandent au programmeur de déclarer expressément, pour chaque variable qu'il introduit dans son code, son typage.
## Syntaxe
---
- Bloque de code PHP : 
```Php
<?php
//commandes
?>
```
- Variable en PHP :
```Php
<?php

$nomVariable = expression;

?>
```
- Afficher la valeure d'une variable en chaîne de caractères
```Php
<?= $nomVariable ?>
```
- Les guillemets simples ( ' ' ) ne vont jamais interpeller les variables à l'intérieur. Ce qui est le cas des guillemets doubles ( " " ).
## Tableaux
---
- Créer un tableau
```php
<?php
$nomVariable = [];
?>
```
- Affecter des valeurs à un tableau
```php
<?php
$nomVariable = [1, 2, 3, 4, "Gloire à la Sainte Expression"];
?>
```
- Utiliser des clefs pour indexer
```php
<?php
$array_expression = [
    "nomClef1" => 1,
    "nomClef2" => "valeur"
];
?>
```
## Structures de choix
---
- Opérateurs de comparaison <br>
```PHP
Exemple	    Nom	                Résultat

$a == $b	Egal	            TRUE si $a est égal à $b après le transtypage.
$a === $b	Identique	        TRUE si $a est égal à $b et qu ils sont de même type.
$a != $b	Différent	        TRUE si $a est différent de $b après le transtypage.
$a <> $b	Différent	        TRUE si $a est différent de $b après le transtypage.
$a !== $b	Différent	        TRUE si $a est différent de $b ou bien s ils ne sont pas du même type.

$a < $b	    Plus petit que	    TRUE si $a est strictement plus petit que $b.
$a > $b	    Plus grand	        TRUE si $a est strictement plus grand que $b.
$a <= $b	Inférieur ou égal	TRUE si $a est plus petit ou égal à $b.
$a >= $b	Supérieur ou égal	TRUE si $a est plus grand ou égal à $b.

$a <=> $b	Combiné	Un entier inférieur, égal ou supérieur à zéro lorsque $a est inférieur, égal, ou supérieur à $b respectivement. Disponible à partir de PHP 7.
```

- Opérateur ternaire ("?:")<br>

L'opérateur ternaire affecte une valeure par défaut si la condition n'est pas respectée.
```php
<?php
$value = ($operator) ? (true value) : (false value)
?>
```

On peut aussi vérifier la valeure en cas de true pour savoir s'il faut l'assigner.
```php
<?php
$value = ($operator) ?: (false value)
?>
```

- If, Then, Else
```Php
<?php

if (expression) {
    //commandes
} else if {
    //commandes
}
else {
    //commandes
}

?>
```
Syntaxe alternative :
```Php
<?php if (expression): ?>
//commandes
<?php endif; ?>
```
- Switch
```PHP
<?php

switch (expression) {
    case expression:
        //commandes
        break;
    case expression
        //commandes
        break;
}
?>
```
## Structures de boucles
---
- Boucle While
```Php
<?php
while (expression) {
    //commandes
}
?>
```
Syntaxe alternative :
```Php
<?php
while (expression):
//commandes
endwhile;
?>
```
- Boucle do-While
```Php
<?php
do {
    //commandes
} while (expression);
?>
```
- Boucles définies<br>
  
les boucles "for" sont le plus souvent utilisées lorsque l’on sait combien de fois on souhaite exécuter le bout de code attaché à la boucle.
```php
<?php
for (expression1, expression2, expression3) {
    //commandes
}
?>
```
- Boucles foreach<br>
  
La structure de langage foreach fournit une façon simple de parcourir des tableaux. foreach ne fonctionne que pour les tableaux et les objets, et émettra une erreur si vous tentez de l'utiliser sur une variable de type différent ou une variable non initialisée.
```php
<?php
foreach ($array_expression as $value){
    //commandes
}
?>
```
La première forme passe en revue le tableau array_expression. À chaque itération, la valeur de l'élément courant est assignée à $value et le pointeur interne de tableau est avancé d'un élément (ce qui fait qu'à la prochaine itération, on accédera à l'élément suivant).
```php
<?php
foreach ($array_expression as $key => $value){
    //commandes
}
?>
```
La seconde forme assignera en plus la clé de l'élément courant à la variable $key à chaque itération.

Syntaxe alternative :
```php
<?php foreach($array_expression as $value): ?>
    //commandes
<?php endforeach; ?>
```

## Structure du langage
---
- echo <br>

Affiche la valeure donnée en paramètre. Ne se comporte pas comme une fonction.
```php
<?php
echo "Votre texte";
echo $value;
?>
```

## Require et Include
---

- Include
```php
<?php
include "nomFichier.php";
?>
```

L'instruction de langage include inclut et exécute le fichier spécifié en argument.

- Require
```php
<?php
require "nomFichier.php";
?>
```

Require est identique à include mis à part le fait que lorsqu'une erreur survient, il produit également une erreur fatale de niveau E_COMPILE_ERROR. En d'autres termes, il stoppera le script alors que include n'émettra qu'une alerte de niveau E_WARNING, ce qui permet au script de continuer.

- Require/Incule_once
```php
<?php
require_once "nomFichier.php";
include_once "nomFichier.php";
?>
```
L'instruction require/incule_once est identique à require mis à part que PHP vérifie si le fichier a déjà été inclus, et si c'est le cas, ne l'inclut pas une deuxième fois.


## Les fonctions
---
- Appel de fonction
```php
<?php
nomFonction(paramètres);
?>
```

### Fonctions à retenir :

- print_r()
    ```php
    <?php
    print_r($expression);
    ?>
    ```
    Affiche des informations à propos d'une variable, de manière à ce qu'elle soit lisible.

- isset()
    ```php
    <?php
    isset($expression);
    ?>
    ```
    Détermine si une variable est déclarée et est différente de NULL.

- var_dump()
    ```php
    <?php
    var_dump($expression);
    ?>
    ```
    var_dump() affiche les informations structurées d'une variable, y compris son type et sa valeur. Les tableaux et les objets sont explorés récursivement, avec des indentations, pour mettre en valeur leur structure.

- readline()
    ```php
    <?php
    readline("Rentrez votre nom : ");
    ?>    
    ```
    Retourne une ligne entrée par l'utilisateur.

### Fonctions utilisateurs :
L'utilisateur peut définir une fonction pour la réutiliser plus tard.

```php
<?php
function nomFonction($expression1, $expression2, /* ..., */ $expression_n)
{
    ...
}
?>
```
## Les formulaires
---
### En HTML ...
- \<form>\</form> -> Englobe un formulaire
    - <strong>Method</strong> -> Définit la méthode HTTP qui sera utilisée.
    - <strong>Action</strong> ->URL du programme qui traitera les informations soumises par le formulaire.
- \<label>\</label> -> légende pour un objet d'une interface utilisateur.
- \<input> -> Champ.
    - <strong>Type</strong> -> Type de données attendues (Text, Password, Checkboxe, Radio, Submit, Hidden, Reset, File).
    - <strong>Name</strong> -> Nomme le champ.
    - <strong>For</strong> -> Spécifie l'id de l'élément de formulaire associé.
    - <strong>Value</strong> -> Valeur par défaut.
    - <strong>Placeholder</strong> -> Valeur temporaire (grisée).
    - <strong>Required</strong> -> Le champ devient obligatoire.

- \<textarea>\</textarea>-> Zone de texte extensible.
- \<select>\</select> -> Liste déroulante.
  - \<option>\</option> -> Option de la liste.

### Méthodes de requête HTTP ...
- HTTP définit un ensemble de méthodes de requête qui indiquent l'action que l'on souhaite réaliser sur la ressource indiquée.
  
- GET<br>
    - La méthode GET demande une représentation de la ressource spécifiée. Les requêtes GET doivent uniquement être utilisées afin de récupérer des données.
  
    - GET envoie les informations en les ajoutant à l'URL.
    - GET aide pour envoyer des données non sensibles.
- POST<br>
    - La méthode POST est utilisée pour envoyer une entité vers la ressource indiquée. Cela  entraîne généralement un changement d'état ou des effets de bord sur le serveur.
    - POST envoie les informations par le HTTP header.
    - POST aide à envoyer des données sensibles.
