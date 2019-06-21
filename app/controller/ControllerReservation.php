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
        $test = false;
        if ($test) {
            ControllerReservation::reserveParking();
        }
        $resultsParking = modelParking::read($_GET["sel_airpot"]);
        require (CHEMIN_VUE . 'viewReserveParking2.php');

        echo('bonjour');
    }

}
