<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include CHEMIN_LIB.'form.php';

// "formulaire_inscription" est l'ID unique du formulaire
$form_inscription = new Form('formulaire_inscription');

$form_inscription->method('POST');

$form_inscription->add('Text', 'nom_utilisateur')
                 ->label("Votre nom d'utilisateur");

$form_inscription->add('Password', 'mdp')
                 ->label("Votre mot de passe");

$form_inscription->add('Password', 'mdp_verif')
                 ->label("Confirmez votre mot de passe");

$form_inscription->add('Email', 'adresse_email')
                 ->label("Votre adresse email"); 

$form_inscription->add('Submit', 'submit')
                 ->value("Je veux m'inscrire !");

// Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
//$form_inscription->bound($_POST);


// Affichage du formulaire
include CHEMIN_VUE.'formulaire_inscription.php';