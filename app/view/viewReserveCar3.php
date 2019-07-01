
<?php

include 'fragmentHeader.html';



include 'fragmentMenuClient.php';

require CHEMIN_LIB . 'php_forms.php';
require CHEMIN_LIB . 'php_tables.php';


if ($results != null) {
    echo'<div class="col-lg-8 col-md-10 mx-auto">';
    require (CHEMIN_VUE . 'viewPrintCars.php');
    echo("</tbody>");
    echo("</table>");

    echo ' <p>Prix total : ' . $price_total . ' € = ' . $interval->d . ' * ' . $price_parking[0] .' </p>';

    echo(" <p>Prix total : ") . $price_total . (" €</p>");
    echo(" <p>Appuyer sur valider pour confirmer la réservation de la voiture choisi entre le ") . $_SESSION['carDateDeb'] .
    (" et le ") . $_SESSION['carDateFin'] . ("</p>");
    echo("<form  action = '../controller/router.php' method = 'post'>") . "\n";
    form_select("Sélection véhicule", "sel_car", $results);

    echo("<button type='submit' class='btn btn-default'>Valider</button>");
    echo("<input type='hidden' name='type' value='reserveCar'>");
    echo("<input type='hidden' name='action' value='endCarReservation'>");

    echo("</form>");
    echo '</div>';
} else {
    echo("<p>Aucune voiture disponible ce jour-ci dans ce parking </p>") . "\n";
//    echo("<form class = 'form-group' action = '../controller/router.php' method = 'post'>");
//    echo("<button type='submit' class='btn btn-default'>Submit</button>");
//    echo("<input type='hidden' name='type' value='client'>");
//    echo("<input type='hidden' name='action' value='ajouterVoiture'>");
//
//    echo("</form>");
}
?>


<?php include 'fragmentFooter.html'; ?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

