<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'fragmentHeader.html';
include 'fragmentMenuClient.php';
include CHEMIN_LIB . 'php_tables.php';
include CHEMIN_LIB . 'php_forms.php';


echo'<div class="col-lg-8 col-md-10 mx-auto">';
table_head($colnames);
echo("<tbody>");
foreach ($results as $mv) {

//    print_r($car_obj);
    $mv->view_id();
}
echo("</tbody>");
echo("</table>");
?>
<form  method='post' action = '../controller/router.php' >

    <?php
    print_r($results);
    $liste_id = array();
    foreach ($results as $mv){
        array_push($liste_id,$mv->getPark_id());
    }
    form_select("Sélection de la réservation à supprimer ", "reservation_id", $liste_id);
    if ($type == 'parking') {
        echo "<input type='hidden' name='type' value='reservation'>";
    }
    else{
        echo "<input type='hidden' name='type' value='reserveCar'>";
    }
    ?>

    <input type='hidden' name='action' value='deleteData'>

    <div class="form-group">
        <button type="submit" class="btn btn-primary" id="sendMessageButton">Supprimer</button>
    </div>
</form>
</div>

<?php
include 'fragmentFooter.html';


