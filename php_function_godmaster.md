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