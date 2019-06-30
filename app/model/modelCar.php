<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



class modelCar {

    private $plate_id, $brand, $modele, $color_car;
    function getPlate_id() {
        return $this->plate_id;
    }

    function getBrand() {
        return $this->brand;
    }

    function getModele() {
        return $this->modele;
    }

    function getColor_car() {
        return $this->color_car;
    }

    function setPlate_id($plate_id) {
        $this->plate_id = $plate_id;
    }

    function setBrand($brand) {
        $this->brand = $brand;
    }

    function setModele($modele) {
        $this->modele = $modele;
    }

    function setColor_car($color_car) {
        $this->color_car = $color_car;
    }

    function viewCar() {
        printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
                $this->getplate_id(), $this->getbrand(), $this->getmodele(), $this->getcolor_car());
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
    
 
       public static function insert($plate_id, $brand, $modele, $color_car) {
        try {
            $database = SModel::getInstance();
            $query = "insert into car value (:plate_id, :brand, :modele, :color_car)";
            $statement = $database->prepare($query);
            $statement->execute([
                'plate_id' => $plate_id,
                'brand' => $brand,
                'modele' => $modele,
                'color_car' => "green"
            ]);
            return TRUE;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

}
