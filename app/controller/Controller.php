<?php


class Controller {

    public static function accueil() {
        require ('../view/viewAccueil.php');
    }

    public static function inscription() {

        // Création d'un tableau des erreurs
        $erreurs_inscription = array();

        // Validation des champs suivant les règles en utilisant les données du tableau $_POST
        if ($form_inscription->is_valid($_POST)) {

            // On vérifie si les 2 mots de passe correspondent
            if ($form_inscription->get_cleaned_data('mdp') != $form_inscription->get_cleaned_data('mdp_verif')) {

                $erreurs_inscription[] = "Les deux mots de passes entrés sont différents !";
            }

            // Si d'autres erreurs ne sont pas survenues
            if (empty($erreurs_inscription)) {

                // Traitement du formulaire à faire ici
            } else {

                // On affiche à nouveau le formulaire d'inscription
                include CHEMIN_VUE . 'formulaireInscription.php';
            }
        }
    }

    public static function printInscription() {
        include CHEMIN_MODELE . 'inscription.php';
    }

}
?>


