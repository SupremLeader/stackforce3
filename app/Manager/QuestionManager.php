<?php

namespace Manager;

class QuestionManager extends \W\Manager\Manager
{



    public function getQuestions($result="", $orderby="date") {
        if ($orderby === "date" || $orderby === "nbreponses") {
            $order = "DESC";
        } elseif ($orderby === "titre" || $orderby === "description") {
            $order = "ASC";
        }
        $sql = "SELECT titre, description, date, nbreponses, pseudo, q.id FROM $this->table AS q 
		INNER JOIN wusers AS w ON q.wusers_id = w.id 
		INNER JOIN questions_tags AS qt ON qt.questions_id = q.id 
		INNER JOIN tags AS t ON t.id = qt.tags_id WHERE t.type LIKE :result OR titre LIKE :result OR description LIKE :result GROUP BY titre ORDER BY $orderby $order";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":result", '%' . $result . '%');
        $sth->execute();

        return $sth->fetchAll();
    }

    public function getQuestion($id) {
        $sql = "SELECT * FROM $this->table AS q 
		INNER JOIN wusers AS w ON q.wusers_id = w.id 
		INNER JOIN questions_tags AS qt ON qt.questions_id = q.id 
		INNER JOIN tags AS t ON t.id = qt.tags_id WHERE q.id = :id GROUP BY titre";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->execute();

        return $sth->fetch();
    }

    public function getAllQuestions($orderby="date") {
        if ($orderby === "date" || $orderby === "nbreponses") {
            $order = "DESC";
        } elseif ($orderby === "titre" || $orderby === "description") {
            $order = "ASC";
        }
        $sql = "SELECT titre, description, date, nbreponses, pseudo, q.id FROM $this->table AS q 
		INNER JOIN wusers AS w ON q.wusers_id = w.id 
		INNER JOIN questions_tags AS qt ON qt.questions_id = q.id 
		INNER JOIN tags AS t ON t.id = qt.tags_id GROUP BY titre ORDER BY $orderby $order";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
    }



    // Fonction countQuestions
    // Permet l'affichage du nombre de questions 
    // sur l'index
    public function countQuestions()
    {
        $sql = "SELECT count(*) FROM questions";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $test = $sth->fetch();
        return $test;
    }

    // Fonction newQuestion()
    // Permet d'inscrire une nouvelle question en bdd
    // et que gerer la table de correspondance question/tags
    // soit les tags concernés par la question.
    public function newQuestion($id, $titre, $description, $tag)
    {
        $sql1 = "INSERT INTO questions (wusers_id, titre, description, date) VALUES (:wusers_id, :titre, :description, :date)";
        //debug($tag);die();
        $sth1 = $this->dbh->prepare($sql1);
        $sth1->bindValue(":wusers_id", $_SESSION['user']['id']);
        $sth1->bindValue(":titre", $titre);
        $sth1->bindValue(":description", $description);
        $sth1->bindValue(":date", date('Y-m-d H:i:s'));
        $sth1->execute();

        $sql2 = "SELECT id FROM questions WHERE wusers_id = '".$_SESSION['user']['id']."' AND titre = '".$titre."'";
        $sth2 = $this->dbh->prepare($sql2);
        $sth2->execute();
        $idquestion = $sth2->fetch();

        foreach($tag as $idtags)
        {
            //debug($idquestion['id']);debug($idtags);die();
            $sql3 = "INSERT INTO questions_tags (questions_id, tags_id) VALUES (:questions_id, :tags_id)";
            $sth3 = $this->dbh->prepare($sql3);
            $sth3->bindValue(":questions_id", $idquestion['id']);
            $sth3->bindValue(":tags_id", $idtags);
            $sth3->execute();
        } 
        unset($_SESSION['msg']);

    }
    
    public function newReponse($questions_id, $message)
    {
        $sql1 = "INSERT INTO reponses (wusers_id, questions_id, message, date) VALUES (:wusers_id, :questions_id, :message, :date)";
        $sth1 = $this->dbh->prepare($sql1);
        $sth1->bindValue(":wusers_id", $_SESSION['user']['id']);
        $sth1->bindValue(":questions_id", $questions_id);
        $sth1->bindValue(":message", $message);
        $sth1->bindValue(":date", date('Y-m-d H:i:s'));
        $sth1->execute();  
        
        if (!empty($_SESSION)) {
            $sql2 = "UPDATE $this->table SET nbreponses = nbreponses + 1 WHERE id = :id";
            $sth2 = $this->dbh->prepare($sql2);
            $sth2->bindValue(":id", $questions_id);
            $sth2->execute();
        }
    }








}