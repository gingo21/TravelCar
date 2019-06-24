<?php

include 'config.php';

require_once 'ControllerUser.php';
require_once 'ControllerReservation.php';
require_once 'ControllerAdmin.php';
require_once 'ControllerRes_car.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_POST["action"];
    $type = $_POST["type"];
}
else{
    $query_string = $_SERVER['QUERY_STRING'];
echo("query_string".$query_string);

// fonction parse_str permet de construire une table de hachage (clé + valeur)
parse_str($query_string, $param);

// $action contient le nom de la méthode statique recherchée
$action = $param["action"];
$type =  $param["type"];

}

if ($type == 'user') {
    $controlleurchoisi = controllerUser::class;
} else if ($type == 'reservation') {
    $controlleurchoisi = controllerReservation::class;
} else if ($type == 'admin') {
    $controlleurchoisi = controllerAdmin::class;
} else if ($type == 'reserveCar') {
    $controlleurchoisi = controllerRes_Car::class;
}

$param = "";

$controller = "Controller";

switch ($action) {
    case "accueil" :
        $controller ="Controller";
    case "inscription" :
        ControllerUser::inscription();
        break;
    case "forminscription" :
        Controller::inscription();
    case "connexion" :
        ControllerUser::connexion();
    case "readAll" :
    case "readAllProd":
    case "read" :
    case "delete" :
    case "readProd" :
    case "idFormAction" :
    case "create" :
    case "created" :
        break;

    default:
        $action = $action ;
}

//$controller::$action();
//echo ("Router : nom = $nom");
// appel de la méthode statique $action de ControllerVin2
//if ($parametres == NULL) {
    $controlleurchoisi::$action();
//} else {
//    $controlleurchoisi::$action($parametres);
//}


