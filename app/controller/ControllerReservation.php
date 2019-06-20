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
class ControllerReservation {
    //put your code here
    public static function reserveParking(){
        require (CHEMIN_VUE . 'viewReserveParking.php');
    }
}
