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
        $name = ' parking';
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
// Function to get all the dates in given range 
        function getDatesFromRange($start, $end, $format = 'Y-m-d') {

            // Declare an empty array 
            $array = array();

            // Variable that store the date interval 
            // of period 1 day 
            $interval = new DateInterval('P1D');

            $realEnd = new DateTime($end);
            $realEnd->add($interval);

            $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

            // Use loop to store date into array 
            foreach ($period as $date) {
                $array[] = $date->format($format);
            }

            // Return the array elements 
            return $array;
        }

// Function call with passing the start date and end date 
        $allDays = getDatesFromRange($date, $date2);

        var_dump($Date);


        foreach ($allDays as $oneDay) {
            $resultat = modelPark::readCarsByDayByParking($oneDay, $_POST["sel_airpot"]);
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
        echo $id_user . "qriniu";
        echo "qgzq" . $plate_id;
        $labelParking = $_SESSION['parking'];
        $price = $_SESSION['price'];
        modelPark::insert($plate_id, $labelParking, $id_user, $date, $date2, $price);
        require (CHEMIN_VUE . 'viewReserveParkingDone.php');
    }

    public static function printreservation() {
        session_start();
        $type = 'parking';
        $controller = 'reservation';
        $test = $_SESSION['id'];
        print_r($test);
        $resultat = modelPark::read((int) $test);
        $colnames = array("Plate ID", "Parking", "Date Début", "Date fin", "prix");
        require (CHEMIN_VUE . 'viewReservationUser.php');
    }

    public static function delete() {
        session_start();
        $type = 'parking';
        
        $date = date('Y/m/d');
        $colnames = array("id","Plate ID", "Parking", "Date Début", "Date fin", "prix");

        $results = modelPark::readSupprimable($_SESSION['id'],$date);
        print_r($results);
        require (CHEMIN_VUE . 'viewDeleteReservation.php');
    }
    
     public static function deleteData() {
        session_start();
        $type = 'parking';
        if (isset($_POST['reservation_id'])) {
            modelPark::delete($_POST['reservation_id']);
        }

        require (CHEMIN_VUE . 'viewAccueilUser.php');
    }
    

}
