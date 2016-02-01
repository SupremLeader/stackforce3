<?php

namespace Manager;

class ProfilManager extends \W\Manager\Manager
{



    public function getAllUsers() {
        $sql = "SELECT * FROM $this->table AS p
		INNER JOIN wusers AS w ON w.id = p.wusers_id ORDER BY p.online DESC, w.pseudo";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
    }
    
    public function setProfilModif($id, $telephone, $facebook, $twitter, $googleplus, $linkedin, $github) {
        $sql = "UPDATE $this->table SET telephone = :telephone, facebook = :facebook, twitter = :twitter, googleplus = :googleplus, linkedin = :linkedin, github = :github WHERE wusers_id = :id";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":telephone", $telephone);
        $sth->bindValue(":facebook", $facebook);
        $sth->bindValue(":twitter", $twitter);
        $sth->bindValue(":googleplus", $googleplus);
        $sth->bindValue(":linkedin", $linkedin);
        $sth->bindValue(":github", $github);
        $sth->bindValue(":id", $id);
        $sth->execute();
    }





    public function getUser($id) 
    {
        $sql = "SELECT * FROM wusers AS wuser
		INNER JOIN profils_wusers AS pw ON pw.wusers_id = wuser.id
		INNER JOIN profils AS profil ON profil.id = pw.profils_id
        WHERE wuser.id = :id";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->execute();

        return $sth->fetch();
    }

    // Fonction getUserProfil($id)
    // Permet de récupérer toute les infos BDD
    // de l'id passé en paramètre
    // Pour affichage dans la page 'Mon profil'
    public function getUserProfil($id)
    {
        $sql = "SELECT * FROM wusers
		INNER JOIN profils ON profils.wusers_id = wusers.id
        WHERE wusers.id = :id";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->execute();

        return $sth->fetch();
    }

    // Fonction getUserProfilskill($id)
    // Permet de récupérer toute les infos BDD
    // de l'id passé en paramètre
    // Pour affichage dans la page 'Mon profil'
    public function getUserProfilskill($id)
    {
        $sql = "SELECT tags_id, level FROM wusers
        INNER JOIN wusers_tags ON wusers_tags.wusers_id = wusers.id
        WHERE wusers.id = :id";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->execute();

        return $sth->fetchAll();
    }

    // Fonction insertUserData($mail, $nom, $prenom, $token)
    // Permet d'insérer les données entré lors de l'inscription
    // Dans la table profil
    // PS: Active sera à modifier quand le mode d'activation du compte par mail sera OK
    public function insertUserData($mail, $nom, $prenom, $token)
    {
        $sql = "SELECT id FROM wusers WHERE wusers.mail = '".$mail."'";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":mail", $mail);
        $sth->execute();
        $wusers_id = $sth->fetch();
        //        echo '<br><br>';
        //        debug($wusers_id['id']);

        $sql = "INSERT INTO profils (wusers_id, nom, prenom, token, active, inscritdepuis) VALUES (:wusers_id, :nom, :prenom, :token, :active, :inscritdepuis)";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":wusers_id", $wusers_id['id']);
        $sth->bindValue(":nom", $nom);
        $sth->bindValue(":prenom", $prenom);
        $sth->bindValue(":token", $token);
        $sth->bindValue(":active", 1);
        $sth->bindValue(":inscritdepuis", date('Y-n-j'));
        $sth->execute();
    }

    // Fonction userIsOnline($id)
    // Permet d'inscrire en bdd que l'user est Online 
    public function userIsOnline($id)
    {
        $sql = "UPDATE profils SET online=1 WHERE profils.wusers_id='".$id."'";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
    }

    // Fonction userIsOffline($id)
    // Permet d'inscrire en bdd que l'user est offline 
    public function userIsOffline($id)
    {
         $sql = "UPDATE profils SET online=0 WHERE profils.wusers_id='".$id."'";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
    }

}