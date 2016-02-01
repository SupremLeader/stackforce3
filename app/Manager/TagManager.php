<?php

namespace Manager;

class TagManager extends \W\Manager\Manager
{
    


	public function getTags($id) {
		$sql = "SELECT q.id, type FROM $this->table AS t 
		INNER JOIN questions_tags AS qt ON t.id = qt.tags_id 
		INNER JOIN questions AS q ON qt.questions_id = q.id WHERE q.id = :id ORDER BY type";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->execute();

		return $sth->fetchAll();
	}
    
    public function getAllTags() {
        $sql = "SELECT * FROM $this->table";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        
        return $sth->fetchAll();
    }
    


}