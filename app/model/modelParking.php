<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class modelParking {

    private $label, $airport, $day_price, $number_max;

    function getLabel() {
        return $this->label;
    }

    function getAirport() {
        return $this->airport;
    }

    function getDay_price() {
        return $this->day_price;
    }

    function getNumber_max() {
        return $this->number_max;
    }

    function setLabel($label) {
        $this->label = $label;
    }

    function setAirport($airport) {
        $this->airport = $airport;
    }

    function setDay_price($day_price) {
        $this->day_price = $day_price;
    }

    function setNumber_max($number_max) {
        $this->number_max = $number_max;
    }

    function viewParking() {
        printf("<tr><td>%s</td><td>%s</td><td>%d</td></tr>",
                $this->getLabel(), $this->getAirport(), $this->getDay_price());
    }

    function viewParkingCar($carByParking) {
        printf("<tr><td>%s</td><td>%s</td><td>%d</td></tr>",
                $this->getLabel(), $this->getAirport(), $this->getDay_price());
    }

    public static function read($id) {
        try {
            $database = SModel::getInstance();
            $query = "select * from parking where airport = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $list_parking_id = $statement->fetchAll(PDO::FETCH_CLASS, "ModelParking");
            return $list_parking_id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // insertion d'un nouveau parking (l'admin peut le faire)
    public static function insert($label, $airport, $dayPrice, $numberMax) {
        try {
            $database = SModel::getInstance();
            $query = "insert into parking value (:label, :airport, :dayPrice, :numberMax)";
            $statement = $database->prepare($query);
            $statement->execute([
                'label' => $label,
                'airport' => $airport,
                'dayPrice' => $dayPrice,
                'numberMax' => $numberMax
            ]);
            return TRUE;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

    public static function readPrice($label) {
        try {
            $database = SModel::getInstance();
            $query = "select day_price from parking where label = :label";
            $statement = $database->prepare($query);
            $statement->execute([
                'label' => $label
            ]);
            $tuple = $statement->fetch();
            return $tuple;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    


}
