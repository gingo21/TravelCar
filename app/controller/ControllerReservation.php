<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerReservation
 *
 * @author francois
 */
include CHEMIN_MODELE . 'modelAeroport.php';
include CHEMIN_MODELE . 'modelParking.php';
include CHEMIN_MODELE . 'modelCarOwner.php';


class ControllerReservation {

    //put your code here
    public static function reserveParking() {
        $type = 'parking';
        $results = ModelAeroport::readAllAcr();
        require (CHEMIN_VUE . 'viewReserveParking.php');
    }

    public static function reserveParkingStep2() {
        //vérifier la validation des données au préalable
        //stockage dans variable de session
        session_start();
        $_SESSION['parkindDateDeb'] = $_POST['date'];
        $_SESSION['parkindDateFin'] = $_POST['date2'];
        $test = false;
        if ($test) {
            ControllerReservation::reserveParking();
        }
        $resultsParking = modelParking::read($_POST["sel_airpot"]);
        require (CHEMIN_VUE . 'viewReserveParking2.php');
    }

    public static function choixVoiture() {
        session_start();

        //vérifier la validation des données au préalable
        //stockage dans variable de session
        $_SESSION['parking'] = $_POST['sel_parking'];
        //on vérifie si l'utilisateur est propriétaire d'une voiture
        $id_user = $_SESSION['id'];
        $results = null;
        echo("$id_user");
        $results = modelCarOwner::readVehiculeId($id_user);
        print_r($results);
        require (CHEMIN_VUE . 'viewReserveParking3.php');

       
    }

}
