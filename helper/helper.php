<?php


function displayListElementsRadio(array $list, string $name, string $data)   {

    foreach ($list as $value){

        $displayValue = htmlentities($value);

        if($value === $data) {
            $attributes = "checked";
        }
        else {
            $attributes = "";
        }

        echo <<<HTML
        <div class="radio">
            <label>
                <input type="radio" name="$name" value="$displayValue" $attributes> $displayValue
            </label>
        </div>
HTML;    
    }
}

function displayListElementsCheckbox(array $list, string $name, array $data)   {

    
    foreach ($list as $value){
        
        $displayValue = htmlentities($value);

        if(in_array($value, $data)){
            $attributes = "checked";
        }
        else {
            $attributes = "";
        }

            echo <<<HTML
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="{$name}[]" value="$displayValue" $attributes> $displayValue
                </label>
            </div>
HTML;              
    }
}

function displayListElementsSelect(array $list, string $data){

    foreach ($list as $value){

        if($value === $data){
            $attributes = "selected";
        }
        else {
            $attributes = "";
        }

        echo <<<HTML
        <option $attributes>$value</option>;
HTML;
    }    
}
?>