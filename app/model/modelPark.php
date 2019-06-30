<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modelPark
 *
 * @author francois
 */
class modelPark {

    //put your code here
    private $park_id, $plate_id, $label_parking, $car_owner_id, $date_debut, $date_fin, $price;
    function getPark_id() {
        return $this->park_id;
    }

    function setPark_id($park_id) {
        $this->park_id = $park_id;
    }

        function getPrice() {
        return $this->price;
    }

    function setPrice($price) {
        $this->price = $price;
    }

        
    function getPlate_id() {
        return $this->plate_id;
    }

    function getLabel_parking() {
        return $this->label_parking;
    }

    function getCar_owner_id() {
        return $this->car_owner_id;
    }

    function getDate_debut() {
        return $this->date_debut;
    }

    function getDate_fin() {
        return $this->date_fin;
    }

    function setPlate_id($plate_id) {
        $this->plate_id = $plate_id;
    }

    function setLabel_parking($label_parking) {
        $this->label_parking = $label_parking;
    }

    function setCar_owner_id($car_owner_id) {
        $this->car_owner_id = $car_owner_id;
    }

    function setDate_debut($date_debut) {
        $this->date_debut = $date_debut;
    }

    function setDate_fin($date_fin) {
        $this->date_fin = $date_fin;
    }

        
       function view() {
        printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td></tr>",
                $this->getPlate_id(), $this->getLabel_parking(), $this->getDate_debut(), $this->getDate_fin(), $this->getPrice());
    }
    
       function view_id() {
        printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td></tr>",
                $this->getPark_id(),$this->getPlate_id(), $this->getLabel_parking(), $this->getDate_debut(), $this->getDate_fin(), $this->getPrice());
    }

    public static function read($a) {
        try {
            $database = SModel::getInstance();
            $query = "select * from park where car_owner_id = :a";
            $statement = $database->prepare($query);
            $statement->execute([
                'a' => $a
            ]);
            $test = $statement->fetchAll(PDO::FETCH_CLASS, "modelPark");
            return $test;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
        public static function readPrice($a) {
        try {
            $database = SModel::getInstance();
            $query = "select price from park where park_id = :a";       
            $statement = $database->prepare($query);
             $statement->execute([
                'a' => $a
             
            ]);
            $results = array();
            while ($tuple = $statement->fetch()) {
                $results[] = $tuple[0];
            }
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    
    
        public static function readSupprimable($a,$b) {
        try {
            $database = SModel::getInstance();
            $query = "select * from park where car_owner_id = :a and date_debut > :b";
            $statement = $database->prepare($query);
            $statement->execute([
                'a' => $a,
                'b' => $b
            ]);
            $test = $statement->fetchAll(PDO::FETCH_CLASS, "modelPark");
            return $test;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
        public static function delete($a) {
        try {
            $database = SModel::getInstance();
            $query = "DELETE FROM park where park_id = :a";
            $statement = $database->prepare($query);
            $statement->execute([
                'a' => $a
             
            ]);
            return TRUE;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

    public static function insert($plate_id, $label_parking, $car_owner_id, $date_debut, $date_fin, $price) {
        try {
            $database = SModel::getInstance();
            $query = "insert into park value (:park_id, :plate_id, :label_parking, :car_owner_id, :date_debut, :date_fin, :price)";
            $statement = $database->prepare($query);
            $statement->execute([
                'park_id' => null,
                'plate_id' => $plate_id,
                'label_parking' => $label_parking,
                'car_owner_id' => $car_owner_id,
                'date_debut' => $date_debut,
                'date_fin' => $date_fin,
                'price' => $price
            ]);
            return TRUE;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

    public static function readCarsByParking($selAirport, $date_debR, $date_finR) {
        try {
            $database = SModel::getInstance();
            $query = "
            select   count  from parking 
            LEFT JOIN (
            select label_parking, count(*) as count from park
            where DATE :date_DebR > date_debut and DATE :date_finR < date_fin
            group by label_parking) as table2 
            ON parking.label = table2.label_parking
            where airport = :airport ";
            $statement = $database->prepare($query);
            $statement->execute([
                'date_DebR' => $date_debR,
                'date_finR' => $date_finR,
                'airport' => $selAirport
            ]);
            $results = array
                (
                array("Volvo", 22, 18),
                array("BMW", 15, 13),
                array("Saab", 5, 2),
                array("Land Rover", 17, 15)
            );
            while ($tuple = $statement->fetch()) {
                $results[] = $tuple[0];
            }
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    //pour un aeroport donné, on renvoi pour chaque parking le nombre de voiture qui sont déjà garé
    //ce jour là
    public static function readCarsByDayByParking($date, $airport) {
        try {
            $database = SModel::getInstance();
            $query = "
            select label_parking, count(plate_id) as n from park 
            where :date between date_debut and date_fin 
            and label_parking in
            ( select label from parking where airport = :airport)
            and plate_id not in 
            ( select plate_id from rent
             where :date between date_start and date_end)
             group by label_parking";
            $statement = $database->prepare($query);
            $statement->execute([
                'date' => $date,
                'airport' => $airport
            ]);
            $results = array();
            
            while ($tuple = $statement->fetch()) {
                $results[] = $tuple;
            }
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function carsReadyToRent($date_debut,$date_fin,$label_parking){
        try {
            print_r($date_fin);
            $database = SModel::getInstance();
            $query = "
            select plate_id from park 
            where :date_debut > date_debut and :date_fin < date_fin
            and label_parking = :label_parking
            and plate_id not in 
            ( select plate_id from rent
             where :date_debut > date_debut and :date_fin < date_fin)"
            ;
            $statement = $database->prepare($query);
            $statement->execute([
                'date_debut' => $date_debut,
                'date_fin' => $date_fin,
                'label_parking' =>$label_parking
            
            ]);
            $results = array();
            while ($tuple = $statement->fetch()) {
                $results[] = $tuple[0];
            }
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
        public static function carsReadyToRentAvancee($date_debut,$date_fin,$label_parking){
        try {
            print_r($date_fin);
            $database = SModel::getInstance();
            $query = "
            select plate_id from park 
            where :date_debut > date_debut and :date_fin  < date_fin
            and label_parking = :label_parking
	   and plate_id not in
            (select plate_id from rent
            where NOT (:date_debut < date_start and :date_fin < date_start) AND
		    not(:date_debut > date_end and :date_fin > date_end)
    ) "
            ;
            $statement = $database->prepare($query);
            $statement->execute([
                'date_debut' => $date_debut,
                'date_fin' => $date_fin,
                'label_parking' =>$label_parking
            
            ]);
            $results = array();
            while ($tuple = $statement->fetch()) {
                $results[] = $tuple[0];
            }
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
          
        

}
