<?php

include CHEMIN_DEFAULT . 'vendor/autoload.php';

class Controller {

    public static function accueil() {
        require ('../view/viewAccueil.php');
    }

    public static function inscription() {

        $v = new Valitron\Validator($_POST);
        $v->rule('required', ['name', 'email'])->message('{field} is required');
        $v->labels(array(
            'name' => 'Name',
            'email' => 'Email address'
        ));
//        $v->rule('equals ', ['mdp', 'mdp_verif']);
//        $v->rule('email', 'email');
        if ($v->validate()) {
            echo "Yay! We're all good!";
            // Tentative d'ajout du membre dans la base de donnees
            list($prenom, $nom, $password, $email) = $form_inscription->get_cleaned_data('nom_utilisateur', 'mdp', 'adresse_email', 'avatar');

// On veut utiliser le modele de l'inscription (~/modeles/inscription.php)
            include CHEMIN_MODELE . 'inscription.php';

// ajouter_membre_dans_bdd() est défini dans ~/modeles/inscription.php
            $id_utilisateur = insert($_POST['name'], $_POST['firstname'], $_POST['telephone'], sha1($_POST['mdp']),
                    $_POST['email']);
        } else {
            // Errors
            print_r($v->errors());
            Controller::printInscription();
        }
    }

    public static function printInscription() {
        include CHEMIN_MODELE . 'inscription.php';
    }

    public static function connexion() {
        require_once CHEMIN_LIB . 'formr/class.formr.php';

// Création d'un tableau des erreurs
        $erreurs_connexion = array();
        $form = new Formr('bootstrap');

// Validation des champs suivant les règles
        if ($form->submit()) {

            $email = $form->post('email');
            echo $email;
            $password = $form->post('password');


            // On veut utiliser le modèle des membres (~/modeles/membres.php)
            include CHEMIN_MODELE . 'modelUser.php';

            // combinaison_connexion_valide() est définit dans ~/modeles/membres.php
            $id_user = ModelUser::combinaison_connexion_valide($email, sha1($password));

            // Si les identifiants sont valides
            if (false !== $id_user) {
//                 $var = var_dump($id_user2);
//                 echo $var;

                $infos_user = ModelUser::lire_infos_utilisateur($id_user);

                // On enregistre les informations dans la session
                $_SESSION['id'] = $id_user;
                echo "prout    " . $id_user;
                echo "test" . $_SESSION['id'];
//                $_SESSION['pseudo'] = $nom_utilisateur;
                $_SESSION['email'] = $infos_user['email'];

                // Affichage de la confirmation de la connexion
                include CHEMIN_VUE . 'connexion_ok.php';
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
?>


