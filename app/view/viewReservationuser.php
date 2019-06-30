<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'fragmentHeader.html';
include 'fragmentMenuClient.php';
require CHEMIN_LIB . 'php_tables.php';

echo'<div class="col-lg-8 col-md-10 mx-auto">';
table_head($colnames);
echo("<tbody>");
foreach ($resultat as $mv) {

//    print_r($car_obj);
$mv->view();
}
echo("</tbody>");
echo("</table>");


echo "<a class='btn btn-primary' href='../controller/router.php?action=delete&type=".$controller."' role='button'>Annuler une réservation</a>";
echo '</div>';

include 'fragmentFooter.html';


