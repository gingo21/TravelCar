<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once CHEMIN_MODELE . 'modelParking.php';

class ControllerAdmin {
    
    public static function addAirport(){
        require ('../view/viewFormAirport.php');
    }
    
    public static function insertAirport(){
        if (isset($_POST['acronym']) && isset($_POST['ville']) && isset($_POST['airport'])) {
            modelAeroport::insert($_POST['acronym'], $_POST['ville'], $_POST['airport']);
            $message = 'Aeroport ajoute!';
        }
        require ('../view/viewAccueilAdmin.php');
    }
    
    public static function addParking(){
        $results = ModelAeroport::readAllAcr();
        require ('../view/viewFormParking.php');
    }
    
    public static function insertParking(){
        if (isset($_POST['label']) && isset($_POST['sel_airport']) && isset($_POST['price']) && isset($_POST['places'])) {
//        print_r($_POST['label']) ;
        echo  'jsalberi';
//                if (isset($_POST['label']) && isset($_POST['price'])) {

            modelParking::insert($_POST['label'], $_POST['sel_airport'], $_POST['price'],$_POST['places']);
            $message = 'Parking ajoute!';
            echo'test';
        }
        echo 'ifbquwiubilqwfun';
        require ('../view/viewAccueilAdmin.php');
    }
    
    public static function viewParks() {
        $results = modelPark::readAll();
        $colnames = array("User ID", "Plate ID", "Parking", "Date Début", "Date fin", "prix");
        require (CHEMIN_VUE . 'viewParksAndUsers.php');
    }
}

