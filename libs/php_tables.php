<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function table_head($colnames) {
    echo ("<table class='table'>");
    echo ("<thead class='thead-light'>");
    echo("<tr>");
    foreach ($colnames as $val){
        echo("<th scope='col'>$val</th>");
    }
    echo ("</tr>");
    echo("</thead>");
}



