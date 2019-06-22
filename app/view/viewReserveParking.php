<?php
session_start();
$test = session_id(); 
echo ($test);

require ('fragmentHeader.html');


include 'fragmentMenuClient.php';
require CHEMIN_LIB . 'php_forms.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="jumbotron">
    <p>Bienvenue, <?php
    
    $keys = array('email', 'id', 'type');
echo (session_id());

      //iterate over the keys to test
foreach($keys as $key) {

    // test if $key exists in the $_SESSION global array
    if (isset($_SESSION[$key])) {

        // it does; output the value
        echo $_SESSION[$key];

        // remove the key so we don't keep outputting the message
//        unset($_SESSION[$key]);
    }
}
        ?>.<br />
        Vous êtes maintenant connecté !</p>
</div>

<div class = "container">
    <h2>Réservation d'un parking</h2>
    <form class="form-inline" action= "../controller/router.php" method="post">
        <?php
        form_select("Sélection aéroport", "sel_airpot", $results);
        ?>
        <div class="form-group">
            <label for="date1">Date de début:</label>
            <input type="date" class="form-control" id="date1" placeholder="Choisir date" name="date">
        </div>
        <div class="form-group">
            <label for="date2">Date de fin:</label>
            <input type="date" class="form-control" id="date2" placeholder="Choisir date" name="date2">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
        <input class='hidden' name='type' value='reservation'>
        <?php
        if ($type == "parking") {
            echo "<input class='hidden' name='action' value='reserveParkingStep2'>";
        } else {
            echo "<input class='hidden' name='action' value='reserverVehiculeDetail'>";
        }
        ?>
    </form>


</div>

<?php include 'fragmentFooter.html'; ?>
