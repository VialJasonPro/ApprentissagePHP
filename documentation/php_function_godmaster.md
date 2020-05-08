# PANTHEON DES FONCTIONS PHP DIVINES
- Appel de fonction
```php
<?php
nomFonction(paramètres);
?>
```
---
## implode
(PHP 4, PHP 5, PHP 7)

implode — Rassemble les éléments d'un tableau en une chaîne

### Description 
```
implode ( string $glue , array $pieces ) : string<br>
```
```
implode ( array $pieces ) : string
```
Rassemble les éléments d'un tableau en une chaîne.

Note:

implode() peut, pour des raisons historiques, accepter les paramètres dans un sens ou dans l'autre. Pour des raisons de cohérence avec explode(), toutefois, il est obsolète de ne pas utiliser l'ordre des arguments tels que documenté.

### Liste de paramètres 

####  glue
- Par défaut, une chaîne vide.

#### pieces
- Le tableau de chaînes à rassembler.

### Valeurs de retour 
Retourne une chaîne contenant la représentation en chaîne de caractères de tous les éléments du tableau <strong>pieces</strong>, dans le même ordre, avec la chaîne <strong>glue</strong>, placée entre deux éléments.

---
## explode
(PHP 4, PHP 5, PHP 7)

explode — Scinde une chaîne de caractères en segments

### Description
```
explode ( string $delimiter , string $string [, int $limit = PHP_INT_MAX ] ) : array
```
explode() retourne un tableau de chaînes de caractères, chacune d'elle étant une sous-chaîne du paramètre <strong>string</strong> extraite en utilisant le séparateur <strong>delimiter</strong>.

### Liste de paramètres

#### delimiter
- Le séparateur.

#### string
- La chaîne initiale.

#### limit
- Si <strong>limit</strong> est défini et positif, le tableau retourné contient, au maximum, <strong>limit</strong> éléments, et le dernier élément contiendra le reste de la chaîne.

- Si le paramètre <strong>limit</strong> est négatif, tous les éléments, excepté les -<strong>limit</strong> derniers éléments sont retournés.

- Si <strong>limit</strong> vaut zéro, il est traité comme valant 1.

Note:

Bien que implode() puisse, pour des raisons historiques, accepter ces paramètres dans n'importe quel ordre, explode() ne le peut pas. Vous devez vous assurer que le paramètre <strong>delimiter</strong> soit placé avant le paramètre <strong>string</strong>.

### Valeurs de retour

Retourne un tableau de chaînes de caractères créées en scindant la chaîne du paramètre <strong>string</strong> en plusieurs morceaux suivant le paramètre <strong>delimiter</strong>.

Si <strong>delimiter</strong> est une chaîne vide (""), explode() retournera FALSE. Si <strong>delimiter</strong> contient une valeur qui n'est pas contenue dans <strong>string</strong> ainsi qu'une valeur négative pour le paramètre <strong>limit</strong>, alors explode() retournera un tableau vide, sinon, un tableau contenant la chaîne <strong>string</strong> entière.

---

## dirname
(PHP 4, PHP 5, PHP 7)

dirname — Renvoie le chemin du dossier parent

### Description
```php
dirname ( string $path [, int $levels = 1 ] ) : string
```
Renvoie le chemin parent d'un chemin représentant un fichier ou un dossier, qui correspond à levels niveau(x) plus haut que le dossier courant.

### Liste de paramètres
<strong>path</strong>
- Un chemin.

- Sous Windows, les slash (/) et antislash (\\) sont utilisés comme séparateurs de dossier. Dans les autres environnements, seul le slash (/) est utilisé.

<strong>levels</strong>
- Le nombre de dossiers parents plus haut.

- Doit être un entier supérieur à 0.

### Valeurs de retour 
Retourne le dossier parent du chemin. S'il n'y a pas de slash dans le chemin path, un point ('.') sera retourné, indiquant le dossier courant. Sinon, la chaîne retournée sera le chemin path dont on aura supprimé tous les /component.

---
## file_put_contents
(PHP 5, PHP 7)

file_put_contents — Écrit des données dans un fichier

### Description
```php 
file_put_contents ( string $filename , mixed $data [, int $flags = 0 [, resource $context ]] ) : int
```
Revient à appeler les fonctions fopen(), fwrite() et fclose() successivement.

Si le fichier filename n'existe pas, il sera créé. Sinon, le fichier existant sera écrasé, si l'option FILE_APPEND n'est pas définie.

### Liste de paramètres

<strong>filename</strong><br>
- Chemin vers le fichier dans lequel on doit écrire les données.

<strong>data</strong><br>
- Les données à écrire. Peut être soit une chaîne de caractères, un tableau ou une ressource de flux (explication plus bas).
  
- Si data est une ressource de type stream, le buffer restant de ce flux sera copié dans le fichier spécifié. Cela revient à utiliser la fonction stream_copy_to_stream().

- Vous pouvez également spécifier le paramètre data en tant qu'un tableau à une seule dimension. C'est l'équivalent à file_put_contents($filename, implode('', $array)).

<strong>flags</strong><br>
- La valeur du paramètre flags peut être n'importe quelle combinaison des drapeaux suivants, liés par l'opérateur binaire OU (|).


- Drapeaux disponibles<br>
  - <strong>FILE_USE_INCLUDE_PATH</strong>	: Recherche le fichier filename dans le dossier d'inclusion. Voir include_path pour plus d'informations.


  - <strong>FILE_APPEND</strong>	: Si le fichier filename existe déjà, cette option permet d'ajouter les données au fichier au lieu de l'écraser.


  - <strong>LOCK_EX</strong>	: Acquiert un verrou exclusif sur le fichier lors de l'opération d'écriture. En d'autre terme, un appel à la fonction flock() survient entre l'appel à la fonction fopen() et l'appel à la fonction fwrite(). Ce comportement n'est pas identique à un appel à la fonction fopen() avec le mode "x".<br>

<strong>context</strong><br>
Une ressource de contexte valide créée avec la fonction stream_context_create().

---
## file_get_contents
(PHP 4 >= 4.3.0, PHP 5, PHP 7)

file_get_contents — Lit tout un fichier dans une chaîne

### Description 

```php
file_get_contents ( string $filename [, bool $use_include_path = FALSE [, resource $context [, int $offset = 0 [, int $maxlen ]]]] ) : string
```

- Identique à la fonction file(), hormis le fait que file_get_contents() retourne le fichier filename dans une chaîne, à partir de la position offset, et jusqu'à maxlen octets. En cas d'erreur, file_get_contents() retourne FALSE.

- file_get_contents() est la façon recommandée pour lire le contenu d'un fichier dans une chaîne de caractères. Elle utilisera un buffer en mémoire si ce mécanisme est supporté par votre système, afin d'améliorer les performances.

Note:

Si vous ouvrez une URI avec des caractères spéciaux, comme des espaces, vous devez encoder cette URI avec la fonction urlencode().

### Liste de paramètres 
<strong>filename</strong>
- Nom du fichier à lire.

<strong>use_include_path</strong>

- Note:

  - La constante FILE_USE_INCLUDE_PATH peut être utilisée pour déclencher la recherche dans le chemin d'inclusion. Ceci est impossible si strict typing est activé, car FILE_USE_INCLUDE_PATH est un int. Utilisez TRUE à la place.

<strong>context</strong>
- Une ressource de contexte valide, créée avec la fonction stream_context_create(). Si vous n'avez pas besoin d'utiliser un contexte particulier, vous pouvez ignorer ce paramètre en affectant la valeur NULL.

<strong>offset</strong>
- La position à partir de laquelle on commence à lire dans le flux original. Une position négative compte à partir de la fin du flux.

- Le déplacement dans le fichier (offset) n'est pas supporté sur des fichiers distants. Si vous tentez de vous déplacer dans un fichier qui n'est pas un fichier local peut fonctionner sur les petits déplacements, mais le comportement peut ne pas être attendu car le processus utilise le flux du buffer.

<strong>maxlen</strong>
- La taille maximale des données à lire. Le comportement par défaut est de lire jusqu'à la fin du fichier. Ce paramètre s'applique sur le flux traité par les filtres.

### Valeurs de retour
Retourne les données lues ou FALSE si une erreur survient.