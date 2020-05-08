# PHP FONCTIONS FORMULAIRES
## min
La fonction <strong>min</strong> demande à l'utilisateur de rentrer un barème ainsi qu'une valeure à tester pour voir si celle-ci est trop petite ou au dessus. Celle-ci n'accepte pas les valeurs non numériques et renverra donc une exception en cas d'entrée non numérique.
Si la valeur est plus haute que le barème, la fonction renverra <strong>true</strong>, sinon, elle renverra <strong>false</strong>.
```php
    /**
     * Teste si une valeur numérique est strictement en dessous d'un barème.
     * 
     * @param mixed $min      Le barème le plus bas.
     * @param mixed $value    La valeur à tester.
     * 
     * @return bool           Selon si la valeur est plus grande ou petite que le barème.
     */
    public static function min($value, $min) : bool {
        if (!is_numeric($value)){
            throw new Exception("Valeure non numérique");
        }
        if($value < $min){
            return false;
        }
        else {
            return true;
        }  
    }
```
### Exemple 
```php
<?php

$minimum = 5.2; //Valeur donnée en paramètre pour min
$maValeur = 5.3; //Valeur donnée en paramètre pour value

min($maValeur, $minimum); //Appel de la fonction avec les paramètres

//Dans ce cas là, $maValeur > $minimum, la fonction renverra TRUE.

```
---
## max
La fonction <strong>min</strong> demande à l'utilisateur de rentrer un barème ainsi qu'une valeure à tester pour voir si celle-ci est trop grande ou en dessous. Celle-ci n'accepte pas les valeurs non numériques et renverra donc une exception en cas d'entrée non numérique.
Si la valeur est plus haute que le barème, la fonction renverra <strong>false</strong>, sinon, elle renverra <strong>true</strong>.
```php
    /**
     * Teste si une valeur numérique est strictement en dessus d'un barème.
     * 
     * @param mixed $max      Le barème le plus haut.
     * @param mixed $value    La valeur à tester.
     * 
     * @return bool           Selon si la valeur est plus grande ou petite que le barème.
     */
    public static function max($value, $max) : bool {
        if (!is_numeric($value)){
            throw new Exception("Valeure non numérique");
        }
        if($value > $max){
            return false;
        }
        else {
            return true;
        }
    }
```
### Exemple 
```php
<?php

$maximum = 5.3; //Valeur donnée en paramètre pour max
$maValeur = 5.2; //Valeur donnée en paramètre pour value

max($maValeur, $maximum); //Appel de la fonction avec les paramètres

//Dans ce cas là, $maValeur < $maximum, la fonction renverra TRUE.

```
---
## minLength
La fonction <strong>minLength</strong> demande à l'utilisateur de rentrer un barème ainsi qu'une chaîne de caractère pour voir si celle-ci n'est pas assez longue ou respecte le barème. Si la valeur est plus longue que le barème, la fonction renverra <strong>true</strong>, sinon, elle renverra <strong>false</strong>.
```php
<?php
    /**
     * Teste si la longueur d'une chaîne de caractères est strictement en dessous d'un barème
     * 
     * @param mixed $min        Le barème le plus bas.
     * @param string $value     La valeur à tester.
     * 
     * @return bool             Selon si la valeur est plus grande ou petite que le barème. 
     */
    public static function minLength(string $value, $min) : bool {
        if(strlen($value) < $min){
            return false;
        }
        else {
            return true;
        }
    }
```
### Exemple 
```php
<?php

$minimum = 3; //Valeur donnée en paramètre pour min
$maValeur = "Zote The Mighty"; //Valeur donnée en paramètre pour value

minLength($maValeur, $minimum); //Appel de la fonction avec les paramètres

//Dans ce cas là, $maValeur > $minimum, la fonction renverra TRUE.

```
---
## maxLength
La fonction <strong>maxLength</strong> demande à l'utilisateur de rentrer un barème ainsi qu'une chaîne de caractère pour voir si celle-ci est trop longue ou respecte le barème. Si la valeur est plus courte que le barème, la fonction renverra <strong>true</strong>, sinon, elle renverra <strong>false</strong>.
```php
    /**
     * Teste si la longueur d'une chaîne de caractères est strictement en dessus d'un barème
     * 
     * @param mixed $max        Le barème le plus haut.
     * @param string $value     La valeur à tester.
     * 
     * @return bool             Selon si la valeur est plus grande ou petite que le barème. 
     */
    public static function maxLength(string $value, $max) : bool {
        if(strlen($value) > $max){
            return false;
        }
        else {
            return true;
        }
    }
```
### Exemple
```php
<?php

$maximum = 3; //Valeur donnée en paramètre pour min
$maValeur = "Hi"; //Valeur donnée en paramètre pour value

maxLength($maValeur, $maximum); //Appel de la fonction avec les paramètres

//Dans ce cas là, $maValeur < $maximum, la fonction renverra TRUE.

```
---
## required
La fonction <strong>required</strong> teste si une variable possède une valeur, en enlevant les possibles espaces avant et après les caractères. Cette dernière option peut être annulée si besoin.
```php
    /**
     * Teste si une valeure a été assignée à une variable.
     * 
     * @param bool $trim (optional)        Si vrai, enlève les espaces entourants la valeur.
     * @param mixed $value                 La valeur à tester.
     * 
     * @return bool                        Selon si la valeur a été assigné ou non.
     */
    public static function required($value, bool $trim = true) : bool {
        $value = ($trim && is_string($value)) ? trim($value) : $value;
        return !empty($value);
    }
```
### Exemple
```php
<?php

$maValeur = "    "; //Valeur donnée en paramètre pour value

required($maValeur); //Appel de la fonction avec les paramètres

//Dans ce cas là, comme $trim = true, les espaces seront tous supprimés. La chaîne sera donc vide, la fonction retournera "False".

```
---
## isIn
La fonction <strong>isIn</strong> va tester si des valeurs sont présentes dans un tableau. Si une des valeurs n'existe pas, la fonction renverra "false". La valeur à tester peut aussi être sous forme d'un tableau réunissant plusieurs valeurs à tester.
```php
    /**
     * Teste si la/les valeurs existe(nt) dans un tableau de données.
     * 
     * @param mixed $existingValues         Tableau des valeurs existantes
     * @param mixed $value                  La valeur à tester
     * 
     * @return bool                         Selon si la/les valeurs existe(nt)
     */
    public static function isIn($value, $existingValues) : bool {
        $existingValues = explode(",",$existingValues);
        if (is_array($value)){
            foreach ($value as $value2){
                if(!in_array($value2, $existingValues)){
                    return false;
                }
            }
            return true;
        }
        if (in_array($value, $existingValues)){
            return true;
        }
        elseif(empty($value)) {
            return true;
        }
        else {
            return false;
        }
    }
```
### Exemple
```php
<?php

$mesValeursExistentes = ["toto", "blob", "tutu", "tata"]; //Tableau de valeurs existentes
$mesValeursATester = ["tutu", "toto", "tata"]; //Tableau de valeurs à tester

isIn($mesValeursATester, $mesValeursExistentes); //Appel de la fonction avec les paramètres

//Comme toutes les valeurs à tester se trouvent dans les valeurs existentent, là fonction renverra "True".

```
---
## validate
La fonction <strong>validate</strong> va tester une valeure selon des paramètres à définirs qui appeleront les fonctions de la même classe.
```php
    /**
     * Teste une valeure selon des paramètres à définir.
     * 
     * @param array $validators     Les validateurs décrivant les tests à executer.
     * @param mixed $value          La valeur à tester.
     * 
     * @return array $errors        Un tableau des validateurs ayant échoués.
     */
    public static function validate($value, array $validators) : array {
        $errorsText = include("lang/validation.php");
        $errors = [];
        foreach ($validators as $validator) {
            
            $params =[];
            $function = explode(":", $validator);
            $validator = $function[0];

            if(array_key_exists(1,$function)){
                $params = explode(";" , $function[1]);
            }
            if (!self::$validator($value, ...$params)){
                $errors[] = $errorsText[$validator];
            }
        }
        return $errors;
    }
```
- $errorsText est un tableau qui contient les messages d'erreurs. Ceux-ci sont gérés dans un autre fichier.
- $errors est un tableau qui retournera toutes les erreurs de validation par rapport à la valeur testée.
- Les ":" séparent le nom de la fonction demandée des paramètres.
- Les ";" séparent les paramètres d'entre eux.
### Exemple
```php
<?php

$characterName = "Ernestin"; //valeur à tester

validate($characterName,["required", "minLength:3", "maxLength:15"]);//Fera appel au fonctions required, minLength avec 3 pour min et maxLenght avec 15 pour max.

```
---