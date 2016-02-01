<?php

namespace Manager;

class Wusers_tagManager extends \W\Manager\Manager
{
    


    public function setWusersTags($id, $tags) {
        foreach ($tags as $tag) {
            $sql = "INSERT INTO $this->table (wusers_id, tags_id, level) VALUES (:wid, :tid, :level)";
            $sth = $this->dbh->prepare($sql);
            $sth->bindValue(":wid", $id['id']);
            $sth->bindValue(":tid", $tag['id']);
            $sth->bindValue(":level", 0);
            $sth->execute();
        }
    }
    
    public function setWusersTagsModif($id, $tags, $vote) {
        foreach ($tags as $tag) {
            $sql = "UPDATE $this->table SET level = level + :vote WHERE wusers_id = :wid AND tags_id = :tid";
            $sth = $this->dbh->prepare($sql);
            $sth->bindValue(":vote", $vote);
            $sth->bindValue(":wid", $id['wusers_id']);
            $sth->bindValue(":tid", $tag['tags_id']);
            $sth->execute();
        }
    }
    
    public function getUserLevel($id) {
        $sql = "SELECT * FROM $this->table AS wt
        INNER JOIN tags AS t ON wt.tags_id = t.id WHERE wusers_id = :id";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->execute();
        
        return $sth->fetchAll();
    }
        


}