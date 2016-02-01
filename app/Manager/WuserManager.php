<?php

namespace Manager;

class WuserManager extends \W\Manager\Manager
{
    


    public function setWuserModif($id, $mail) {
        $sql = "UPDATE $this->table SET mail = :mail WHERE id = :id";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":mail", $mail);
        $sth->bindValue(":id", $id);
        $sth->execute();
    }
    
    public function getWuserId($mail) {
        $sql = "SELECT id FROM $this->table WHERE mail = :mail";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":mail", $mail);
        $sth->execute();
        
        return $sth->fetch();
    }
    


}