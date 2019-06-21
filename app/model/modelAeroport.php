<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class modelAeroport{
    
    private $acronym, $city, $name_airport;
    function getAcronym() {
        return $this->acronym;
    }

    function getCity() {
        return $this->city;
    }

    function getName_airport() {
        return $this->name_airport;
    }

    function setAcronym($acronym) {
        $this->acronym = $acronym;
    }

    function setCity($city) {
        $this->city = $city;
    }

    function setName_airport($name_airport) {
        $this->name_airport = $name_airport;
    }

        // retourne une liste d'objets Aeroport
    public static function readAll() {
        try {
            $database = SModel::getInstance();
            $query = "select * from airport";
            $statement = $database->prepare($query);
            $statement->execute();
            // permet de récupérer un tableau d'aéroport 
            
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "modelAeroport");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    // retourne une liste des acronymes azeroport
    public static function readAllAcr() {
        try {
            $database = SModel::getInstance();
            $query = "select acronym from airport";       
            $statement = $database->prepare($query);
            $statement->execute();
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

    

