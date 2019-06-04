<?php

require_once 'SModel.php';

class modelUser{
    
    private $id, $name, $prenom, $tel, $password, $email;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getTel() {
        return $this->tel;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }


    
//    function ajouter_membre_dans_bdd($nom_utilisateur, $mdp, $adresse_email, $hash_validation) {
//
//	$database = SModel::getInstance();;
//
//	$requete = $database->prepare("INSERT INTO user SET
//		nom_utilisateur = :nom_utilisateur,
//		mot_de_passe = :mot_de_passe,
//		adresse_email = :adresse_email,
//		hash_validation = :hash_validation,
//		date_inscription = NOW()");
//
//	$requete->bindValue(':nom_utilisateur', $nom_utilisateur);
//	$requete->bindValue(':mot_de_passe',    $mdp);
//	$requete->bindValue(':adresse_email',   $adresse_email);
//	$requete->bindValue(':hash_validation', $hash_validation);
//
//	if ($requete->execute()) {
//	
//		return $database->lastInsertId();
//	}
//	return $requete->errorInfo();
//}

  public static function insert($name, $firstname, $telephone, $password, $email) {
        try {
            $database = SModel::getInstance();
            $query = "insert into User value (:id, :name, :prenom, :telephone, :password, :email)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => null,
                'name' => $name,
                'prenom' => $firstname,
                'telephone' => $telephone,
                'password' => $password,
                'email' => $email
            ]);
            return TRUE;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }
    

public static function combinaison_connexion_valide($email, $password) {

	$pdo = SModel::getInstance();
	$requete = $pdo->prepare("SELECT id FROM user
		WHERE
		email = :email AND 
		password = :password");

	$requete->bindValue(':email', $email);
	$requete->bindValue(':password', $password);
	$requete->execute();
        
       	if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
	
		$requete->closeCursor();
		return $result['id'];
                echo "tralalalala";
	}
        return false;
}

public static function lire_infos_utilisateur($id_user) {

	$pdo = SModel::getInstance();

	$requete = $pdo->prepare("SELECT name, prenom, password, telephone, email
		FROM user
		WHERE
		id = :id_user");

	$requete->bindValue(':id_user', $id_user);
	$requete->execute();
	
	if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
	
		$requete->closeCursor();
		return $result;
	}
	return false;
}

    
}




