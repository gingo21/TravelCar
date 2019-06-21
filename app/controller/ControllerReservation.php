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
        $_SESSION['parkindDateDeb'] = $_POST['Date1'];
        $_SESSION['parkindDateFin'] = $_POST['Date2'];
        $test = false;
        if ($test) {
            ControllerReservation::reserveParking();
        }
        $resultsParking = modelParking::read($_GET["sel_airpot"]);
        require (CHEMIN_VUE . 'viewReserveParking2.php');
    }

    public static function choixVoiture() {
        //vérifier la validation des données au préalable
        //stockage dans variable de session
        $_SESSION['parking'] = $_POST['$nomParking'];
        //on vérifie si l'utilisateur est propriétaire d'une voiture
        $id_user = $_SESSION['id'];
        $results = modelCarOwner::readVehiculeId($id_user);
        require (CHEMIN_VUE . 'viewReserveParking3.php');

        if (results != null) {
            //s'il est propriétaire on récupère des infos sur ses voitures
            foreach ($results as $mv) {
                
            }
        }
    }

}
