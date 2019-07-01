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
require_once CHEMIN_MODELE . 'modelAeroport.php';
require_once CHEMIN_MODELE . 'modelParking.php';
require_once CHEMIN_MODELE . 'modelCarOwner.php';
require_once CHEMIN_MODELE . 'modelPark.php';
require_once CHEMIN_MODELE . 'modelRent.php';

class ControllerRes_car {

    //put your code here
    public static function reserveCar() {
        $type = 'car';
           $name = 'e voiture';
        $results = ModelAeroport::readAllAcr();
        require (CHEMIN_VUE . 'viewReserveParking.php');
    }

    public static function reserveCarStep2() {
        //vérifier la validation des données au préalable
        //stockage dans variable de session
        $type = 'car';
     
        ;

        if (isset($_POST['date'])) {
            $date = $_POST['date'];
        }
        if (isset($_POST['date2'])) {
            $date2 = $_POST['date2'];
        }
        $_SESSION['carDateDeb'] = $date;
        $_SESSION['carDateFin'] = $date2;

     

        if (isset($_POST["sel_airpot"])) {
            $resultsParking = modelParking::read($_POST["sel_airpot"]);
            $resultsCarsByParking = modelPark::readCarsByParking($_POST["sel_airpot"], $date, $date2);
            print_r($resultsCarsByParking);
        }
        require (CHEMIN_VUE . 'viewReserveParking2.php');
    }

    public static function choixVoiture() {
        ;

        //vérifier la validation des données au préalable
        //stockage dans variable de session
        $labelParking = $_POST['sel_parking'];
        $price_parking = modelParking::readPrice($labelParking);

        $_SESSION['parking_car'] = $labelParking;
        //calculons le prix
        $datetime1 = new DateTime($_SESSION['carDateDeb']);
        $datetime2 = new DateTime($_SESSION['carDateFin']);
        $interval = $datetime1->diff($datetime2);
        $price_total = $price_parking[0] * $interval->d;
        $_SESSION['price_car'] = $price_total;
        
        // ON Recupere les voitures qui sont disponibles dans ce parking pour cette periode
        $results = modelPark::carsReadyToRentAvancee($_SESSION['carDateDeb'],$_SESSION['carDateFin'],$labelParking);
        require (CHEMIN_VUE . 'viewReserveCar3.php');
    }

    public static function endCarReservation() {
        ;

        // on stocke tout dans la base de données
        if (isset($_POST['sel_car'])) {
            $plate_id = $_POST['sel_car'];
        }
        $date = $_SESSION['carDateDeb'];
        $date2 = $_SESSION['carDateFin'];
        $id_user = $_SESSION['id'];
        $labelParking = $_SESSION['parking_car'];
        $price = $_SESSION['price_car'];
        print_r($id_user);
        print_r($labelParking);
        modelRent::insert($plate_id, $id_user, $labelParking, $date, $date2, $price);
        require (CHEMIN_VUE . 'viewReserveCarDone.php');
    }
    
        public static function printreservation(){
            $type = 'car';
            $controller = 'reserveCar';
            $test = $_SESSION['id'];
            print_r($test);
            $resultat = modelRent::read($_SESSION['id']);
            $colnames = array("Plate ID", "Parking", "Date Début", "Date fin","prix");
             include (CHEMIN_VUE . 'viewReservationUser.php');

    }

}
