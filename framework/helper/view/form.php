<?php

function gen_select($id, $name, $selection, $default_selection)
{
    echo('<select class="form-select" id="'.$id.'" aria-label="Default" name="'.$name.'">');
    echo gen_option($selection, $default_selection);
    echo('</select>');
}

function gen_option($selection, $default_selection){
    $ret='';
    foreach ($selection as $key => $value) {
        $select_user_type = ($value == $default_selection) ? 'selected' : '';
        $ret.='<option value="'.$key.'" '.$select_user_type.'>'.$value.'</option>';
    }
    return $ret;
}