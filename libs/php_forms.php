<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function form_select($label, $name, $liste) {
    echo ("<label for = $name > $label </label>");
    echo ("<select class= 'form-control' id=$name name=$name required>");
    foreach ($liste as $val)
        echo ("<option>$val</option>");
    echo ("</select>");
}
