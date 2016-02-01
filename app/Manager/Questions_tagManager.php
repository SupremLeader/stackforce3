<?php

namespace Manager;

class Questions_tagManager extends \W\Manager\Manager
{
    


    public function getQuestionTags($id) {
        $sql = "SELECT * FROM $this->table WHERE questions_id = :id";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->execute();

        return $sth->fetchAll();
    }
    

    
}