
<?php
include 'fragmentHeader.html';
include 'fragmentMenuClient.php';
require CHEMIN_LIB . 'php_forms.php';
?>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Parking</th>
            <th scope="col">Aéroport</th>
            <th scope="col">Prix à a journée</th>
            <th scope="col">Nombre de places</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomParking = array();
        foreach ($resultsParking as $mv) {
        $mv->viewParking();
        array_push($nomParking, $mv->getLabel());
        }
        ?>
    </tbody>


</table>
<form class = "form-inline" action = "../controller/router.php" method = "post">
<?php
form_select("Choisissez le parking", "sel_parking", $nomParking);
?>
<button type="submit" class="btn btn-default">Submit</button>
<input class='hidden' name='type' value='reservation'>
<input class='hidden' name='action' value='choixVoiture'>

</form>
?>


<?php include 'fragmentFooter.html'; ?>
