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
            $query = "select plate_id from car_owner where car_owner_id = :car_owner_id and"
                    . "$date_end = 'null' ";
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

}
