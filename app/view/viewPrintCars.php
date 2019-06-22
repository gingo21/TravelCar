<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$colnames = array("Plate ID", "Brand", "Model", "Color");
table_head($colnames);
echo("<tbody>");
//s'il est propriétaire on récupère des infos sur ses voitures
foreach ($results as $mv) {
    $car_obj = modelCar::read($mv);
//    print_r($car_obj);
    $car_obj[0]->viewCar();
}
echo("</tbody>");
echo("</table>");

