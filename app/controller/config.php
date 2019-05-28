<?php

//$nom = "reymondf";
//
$dsn = 'mysql:dbname=reymondf;host=localhost;charset=utf8';
$username ='root';
$password = '';

//paramètres de la connexion à la base

// Chemins à utiliser pour accéder aux vues/modeles/librairies
//$module = empty($module) ? !empty($_GET['module']) ? $_GET['module'] : 'index' : $module;
//define('CHEMIN_VUE',    'modules/'.$module.'/vues/');
define('CHEMIN_VUE',    'C:/wamp64/www/TravelCar/app/view/');
define('CHEMIN_MODELE', '../../app/model/');
define('CHEMIN_LIB',    '../../libs/');
