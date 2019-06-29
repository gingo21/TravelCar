<?php

include 'config.php';

require_once 'ControllerUser.php';
require_once 'ControllerReservation.php';
require_once 'ControllerAdmin.php';
require_once 'ControllerRes_car.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_POST["action"];
    $type = $_POST["type"];
    echo $action;
echo $type;
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
    echo 'waubgbiwue';
    $controlleurchoisi = controllerUser::class;
} else if ($type == 'reservation') {
    $controlleurchoisi = controllerReservation::class;
} else if ($type == 'admin') {
    $controlleurchoisi = controllerAdmin::class;
} else if ($type == 'reserveCar') {
    $controlleurchoisi = controllerRes_Car::class;
}
else{
        echo 'waubgbiwue';

    $controlleurchoisi = controllerUser::class;
    $action = 'accueil';
}




//if ($parametres == NULL) {
    $controlleurchoisi::$action();
//} else {
//    $controlleurchoisi::$action($parametres);
//}


