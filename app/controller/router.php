<?php

include 'config.php';
require_once 'ControllerUser.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $action = $_POST["action"];
}
else{
    $query_string = $_SERVER['QUERY_STRING'];
echo("qierbugzrqiug".$query_string);

// fonction parse_str permet de construire une table de hachage (clé + valeur)
parse_str($query_string, $param);

// $action contient le nom de la méthode statique recherchée
$action = $param["action"];
}
// récupération de l'action passée dans l'URL


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
        $action = "accueil";
}



//$controller::$action();


