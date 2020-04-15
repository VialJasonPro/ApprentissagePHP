<?php
abstract class Validator {

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
}