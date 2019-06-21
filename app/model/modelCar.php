<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//DROP TABLE IF EXISTS car;
//CREATE TABLE IF NOT EXISTS car (
//	plate_id VARCHAR(15),
//	brand VARCHAR(15),
//	modele varchar(15),
//	color_car ENUM("blue","red","green","grey"),
//	PRIMARY KEY(plate_id)
//) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

class modelCar {

    private $plate_id, $brand, $modele, $color_car;

    function viewCar() {
        printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
                $this->$plate_id(), $this->$brand(), $this->$modele(), $this->$color_car());
    }
  
 //on récupère les informations d'une voiture à partir de sa plaque d'immatriculation
        public static function read($plate_id) {
        try {
            $database = SModel::getInstance();
            $query = "select * from car where plate_id = :plate_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'plate_id' => $plate_id
            ]);
            $car = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCar");
            return $car;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

}
