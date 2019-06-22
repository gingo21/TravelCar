
<?php
include 'fragmentHeader.html';



include 'fragmentMenuClient.php';
include CHEMIN_MODELE . 'modelCar.php';

require CHEMIN_LIB . 'php_forms.php';
require CHEMIN_LIB . 'php_tables.php';


if ($results != null) {

    $colnames = array("Plate ID", "Brand", "Model", "Color");
    table_head($colnames);
    echo("<tbody>");
    //s'il est propriétaire on récupère des infos sur ses voitures
    foreach ($results as $mv) {
        $car_obj = modelCar::read($mv);
        print_r($car_obj);
        $car_obj[0]->viewCar();
    }
    echo("</tbody>");
    echo("</table>");
} else {
    echo("<p>Vous n'avez pas encore enregistré de voiture dans votre compte : cliquer pour ajouter une voiture</p>");
    echo("<form class = 'form-inline' action = '../controller/router.php' method = 'post'");
    echo("<button type='submit' class='btn btn-default'>Submit</button>");
    echo("<input class='hidden' name='type' value='client'>");
    echo("<input class='hidden' name='action' value='ajouterVoiture'>");

    echo("</form>");
}
?>





?>


<?php include 'fragmentFooter.html'; ?>
