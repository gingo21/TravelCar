<?php

require_once 'SModel.php';

class modelUser {

    private $id, $name, $firstname, $tel, $password, $email, $type;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
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
    function getFirstname() {
        return $this->firstname;
    }

    function getType() {
        return $this->type;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setType($type) {
        $this->type = $type;
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

    public static function insert($name, $firstname, $telephone, $password, $email) {
        try {
            $database = SModel::getInstance();
            $query = "insert into User value (:id, :name, :prenom, :telephone, :password, :email, :type)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => null,
                'name' => $name,
                'prenom' => $firstname,
                'telephone' => $telephone,
                'password' => $password,
                'email' => $email,
                'type' => "client"
            ]);
            return TRUE;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }
    
    public static function modifyPassword($id, $password) {
        try {
            $database = SModel::getInstance();
            $query = "UPDATE user SET password =:password
            WHERE id=:id ";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'password' => $password,
            ]);
            return TRUE;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

    public static function connexion_ok($email, $password) {

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

        $requete = $pdo->prepare("SELECT name, firstname, password, telephone, email, type
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
