<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'fragmentHeader.html';
$titre = "Réservations";
include 'fragmentMenuAdmin.php';
require CHEMIN_LIB . 'php_tables.php';
echo '<h1>Réservations de places</h1>';
echo'<div class="col-lg-8 col-md-10 mx-auto">';
table_head($colnames);
echo("<tbody>");
foreach ($results as $mv) {

//    print_r($car_obj);
$mv->view_owner();
}
echo("</tbody>");
echo("</table>");

echo '</div>';

echo '<h1>Réservations de voitures</h1>';
echo'<div class="col-lg-8 col-md-10 mx-auto">';
table_head($colnames);
echo("<tbody>");
foreach ($results2 as $mv) {

//    print_r($car_obj);
$mv->viewWithRenter();
}
echo("</tbody>");
echo("</table>");

echo '</div>';

include 'fragmentFooter.html';

