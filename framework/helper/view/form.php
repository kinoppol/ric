<?php

function gen_select($id, $name, $selection, $default_selection)
{
    echo('<select class="form-select" id="'.$id.'" aria-label="Default" name="'.$name.'">');
    foreach ($selection as $key => $value) {
        $select_user_type = ($value == $default_selection) ? 'selected' : '';
        echo('<option value="'.$key.'" '.$select_user_type.'>'.$value.'</option>');
    }
    echo('</select>');
}