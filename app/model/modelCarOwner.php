<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelCarOwner
 *
 * @author francois
 */
class modelCarOwner {

    //put your code here
    private $plate_id, $car_owner_id, $date_start, $date_end;

    //on récupère les véhicules dont le propriétaire est encore propriétaire
    public static function readVehiculeId($car_owner_id) {
        try {
            $database = SModel::getInstance();
            $query = "select plate_id from car_owner where car_owner_id = :car_owner_id and
        isnull(date_end)";
            $statement = $database->prepare($query);
            $statement->execute([
                'car_owner_id' => $car_owner_id
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
    
           public static function insert($plate_id, $car_owner_id, $date_start) {
        try {
            $database = SModel::getInstance();
            $query = "insert into car_owner value (:plate_id, :car_owner_id, :date_start, :date_end)";
            $statement = $database->prepare($query);
            $statement->execute([
                'plate_id' => $plate_id,
                'car_owner_id' => $car_owner_id,
                'date_start' => $date_start,
                'date_end' => null
            ]);
            return TRUE;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

}
