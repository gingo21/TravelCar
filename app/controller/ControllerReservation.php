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
include CHEMIN_MODELE . 'modelPark.php';

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

        if (isset($_POST['date'])) {
            $date = $_POST['date'];
        }
        if (isset($_POST['date2'])) {
            $date2 = $_POST['date2'];
        }
        $_SESSION['parkindDateDeb'] = $date;
        $_SESSION['parkindDateFin'] = $date2;
        
        //on recupere toutes les jours entre les 2 dates
        $allDays = getDatesBetween($date,$date2);
        foreach ($allDays as $oneDay){
            $resultat = modelPark::readCarsByDayByParking($oneDay,$_POST["sel_airpot"]);
            print_r($resultat);
        }
        $resultsParking = modelParking::read($_POST["sel_airpot"]);
        
        
        require (CHEMIN_VUE . 'viewReserveParking2.php');
    }

    public static function choixVoiture() {
        session_start();

        //vérifier la validation des données au préalable
        //stockage dans variable de session
        $labelParking = $_POST['sel_parking'];
        $price_parking = modelParking::readPrice($labelParking);

        $_SESSION['parking'] = $labelParking;
        //calculons le prix
        $datetime1 = new DateTime($_SESSION['parkindDateDeb']);
        $datetime2 = new DateTime($_SESSION['parkindDateFin']);
        $interval = $datetime1->diff($datetime2);
        print_r($interval->d);
        print_r($price_parking);
        $price_total = $price_parking[0] * $interval->d;
        $_SESSION['price'] = $price_total;


        //on vérifie si l'utilisateur est propriétaire d'une voiture

        $id_user = $_SESSION['id'];
        $results = null;
        echo("$id_user");
        $results = modelCarOwner::readVehiculeId($id_user);
        print_r($results);
        require (CHEMIN_VUE . 'viewReserveParking3.php');
    }

    public static function endParkingReservation() {
        session_start();

        // on stocke tout dans la base de données
        if (isset($_POST['sel_car'])) {
            $plate_id = $_POST['sel_car'];
        }
        $date = $_SESSION['parkindDateDeb'];
        $date2 = $_SESSION['parkindDateFin'];
        $id_user = $_SESSION['id'];
        echo $id_user. "qriniu";
        echo "qgzq". $plate_id;
        $labelParking = $_SESSION['parking'];
        $price = $_SESSION['price'];
        modelPark::insert($plate_id, $labelParking, $id_user, $date, $date2, $price);
        require (CHEMIN_VUE . 'viewReserveParkingDone.php');
    }

}
