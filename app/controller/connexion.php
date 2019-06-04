<?php


require_once CHEMIN_LIB . 'formr/class.formr.php';

include CHEMIN_VUE.'formulaire_connexion.php';

// Création d'un tableau des erreurs
$erreurs_connexion = array();

// Validation des champs suivant les règles
if ($form->submit())  {
	
        $email = $form->post('email');
        $password = $form-> post('password');

	
	// On veut utiliser le modèle des membres (~/modeles/membres.php)
	include CHEMIN_MODELE.'modelUser.php';
	
	// combinaison_connexion_valide() est définit dans ~/modeles/membres.php
	$id_user = combinaison_connexion_valide($email, sha1($password));
	
	// Si les identifiants sont valides
	if (false !== $id_user) {

		$infos_user = lire_infos_utilisateur($id_user);
		
		// On enregistre les informations dans la session
		$_SESSION['id']     = $id_user;
		$_SESSION['pseudo'] = $nom_utilisateur;
		$_SESSION['email']  = $infos_utilisateur['adresse_email'];
		
		// Affichage de la confirmation de la connexion
		include CHEMIN_VUE.'connexion_ok.php';
	
	} else {

		$erreurs_connexion[] = "Couple nom d'utilisateur / mot de passe inexistant.";
		
		// On réaffiche le formulaire de connexion
		include CHEMIN_VUE.'formulaire_connexion.php';
        } 
}else {

    // On réaffiche le formulaire de connexion
    include CHEMIN_VUE.'formulaire_connexion.php';
}

