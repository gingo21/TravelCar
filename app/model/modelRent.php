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
class modelRent {
    
    //put your code here
    private $plate_id, $label_parking, $renter_id, $date_start, $date_end;

    public static function insert($plate_id, $label_parking, $renter_id, $date_start, $date_end, $price) {
        try {
            $database = SModel::getInstance();
            $query = "insert into rent value (:rent_id, :plate_id, :label_parking, :renter_id, :date_start, :date_end, :price)";
            $statement = $database->prepare($query);
            $statement->execute([
                'rent_id' => null,
                'plate_id' => $plate_id,
                'label_parking' => $label_parking,
                'renter_id' => $renter_id,
                'date_start' => $date_start,
                'date_end' => $date_end,
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
          
        

}
