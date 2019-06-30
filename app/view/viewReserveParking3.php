
<?php

include 'fragmentHeader.html';



include 'fragmentMenuClient.php';

require CHEMIN_LIB . 'php_forms.php';
require CHEMIN_LIB . 'php_tables.php';


if ($results != null) {
    require (CHEMIN_VUE . 'viewPrintCars.php');
    echo("</tbody>");
    echo("</table>");


    echo(" <p>Prix total : ") . $price_total . (" €</p>");
    echo(" <p>Appuyer sur valider pour confirmer la réservation de parking pour la voiture choisi entre le ") . $_SESSION['parkindDateDeb'] .
    (" et le ") . $_SESSION['parkindDateFin'] . ("</p>");
    echo("<form  action = '../controller/router.php' method = 'post'>") . "\n";
    form_select("Sélection véhicule", "sel_car", $results);

    echo("<button type='submit' class='btn btn-default'>Valider</button>");
    echo("<input type='hidden' name='type' value='reservation'>");
    echo("<input type='hidden' name='action' value='endParkingReservation'>");

    echo("</form>");
} else {
    echo("<p>Vous n'avez pas encore enregistré de voiture dans votre compte : cliquer pour ajouter une voiture</p>") . "\n";
    echo("<form class = 'form-group' action = '../controller/router.php' method = 'post'>");
    echo("<button type='submit' class='btn btn-default'>Submit</button>");
    echo("<input class='hidden' name='type' value='client'>");
    echo("<input class='hidden' name='action' value='ajouterVoiture'>");

    echo("</form>");
}
?>


<?php include 'fragmentFooter.html'; ?>
