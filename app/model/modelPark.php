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
    private $plate_id, $label_parking, $car_owner_id, $date_debut, $date_fin;

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
