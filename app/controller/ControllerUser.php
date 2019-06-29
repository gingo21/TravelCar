<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once CHEMIN_LIB . 'formr/class.formr.php';
require_once CHEMIN_MODELE . 'modelUser.php';
require_once CHEMIN_MODELE . 'modelCar.php';
//require_once CHEMIN_MODELE . 'modelCarOwner.php';




class ControllerUser {

    public static function accueil() {
        require ('../view/viewAccueil.php');
    }
    
    public static function modifier() {
        require ('../view/viewModifier.php');
    }
    
    public static function addCar() {
        require ('../view/viewFormCar.php');
    }
    
    public static function handleCarForm(){
        session_start();
        echo'hiiii';
        if (isset($_POST['plate_id'])&& isset($_POST['brand']) && isset($_POST['modele'])){
            echo('hiiiii@@@@');
            modelCar::insert($_POST['plate_id'], $_POST['brand'],$_POST['modele'], $_POST['modele'], "green");
            $date = date('Y/m/d');
            echo '   '. $date;
            modelCarOwner::insert($_POST['plate_id'],$_SESSION['id'],$date);
            $message = 'Votre voiture a bien ete ajoute';
            
        }
//                require ('../view/viewAccueil.php');

    }

    public static function inscription() {
        session_start();
      

                include CHEMIN_VUE . 'formulaire_inscription.php';
  
        }

// print messages
        echo $form->messages();

// Création d'un tableau des erreurs
        $erreurs_inscription = array();
    }

    public static function InscriptionDone() {
        $email = $form->post('email', 'Email', 'valid_email');
            $password = $form->post('passwd', 'Password', 'min_length[6]|hash');
            $pass_conf = $form->post('passwd_conf', 'Confirm Password', 'min_length[6]|matches[passwd]');

            // check if there were any errors
         
                // no errors
                // user has entered a valid email address, username, and confirmed their password
                $results = ModelUser::insert($_POST['lname'], $_POST['fname'], $_POST['telephone'], sha1($_POST['passwd']),
                                $_POST['email'],"client");
                
             $id_user = ModelUser::connexion_ok($_POST['email'], $_POST['passwd']);
             $_SESSION['id'] = $id_user;
            include CHEMIN_VUE . 'viewFormCar.php';
    }

    public static function connexion() {
        require_once CHEMIN_LIB . 'formr/class.formr.php';

// Création d'un tableau des erreurs
        $erreurs_connexion = array();
        $form = new Formr('bootstrap');

// Validation des champs suivant les règles
        if ($form->submit()) {

            $email = $form->post('email');
//            echo $email;
            $password = $form->post('password');


            // combinaison_connexion_valide() est définit dans ~/modeles/membres.php
            $id_user = ModelUser::connexion_ok($email, sha1($password));

            // Si les identifiants sont valides
            if (false !== $id_user) {
//                 $var = var_dump($id_user2);
//                 echo $var;

                $infos_user = ModelUser::lire_infos_utilisateur($id_user);
                session_start();
                // On enregistre les informations dans la session
                $_SESSION['id'] = $id_user;
                $_SESSION['email'] = $infos_user['email'];
                $_SESSION['type'] = $infos_user['type'];

                // Affichage de la confirmation de la connexion
//                echo $_SESSION['type'];
                if ($_SESSION['type'] == 'client'){

                    include CHEMIN_VUE . 'viewFormCar.php';
                }
                else {
                    include CHEMIN_VUE . 'viewAccueilAdmin.php';

                }
            } else {

                $erreurs_connexion[] = "Couple nom d'utilisateur / mot de passe inexistant.";

                // On réaffiche le formulaire de connexion
                include CHEMIN_VUE . 'formulaire_connexion.php';
            }
        } else {

            // On réaffiche le formulaire de connexion
            include CHEMIN_VUE . 'formulaire_connexion.php';
        }
    }

}
