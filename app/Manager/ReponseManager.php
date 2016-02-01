<?php

namespace Manager;

class ReponseManager extends \W\Manager\Manager
{
    


	public function getAllAnswers($id) {
		$sql = "SELECT * FROM $this->table WHERE questions_id = :id ORDER BY nbvote DESC";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function setVote($id, $vote) {
		$sql = "UPDATE $this->table SET nbvote = nbvote + :vote WHERE id = :id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":vote", $vote);
        $sth->bindValue(":id", $id);
		$sth->execute();

		return $sth->fetch();
	}
    
    public function getAnswer($id) {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
		$sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
		$sth->execute();

		return $sth->fetch();
    }
    


}