<?php

namespace Controller;

use Manager\QuestionManager;
use Manager\TagManager;
use Manager\WuserManager;
use Manager\ProfilManager;
use Manager\ReponseManager;
use Manager\Questions_tagManager;
use Manager\Wusers_tagManager;
use \W\Controller\Controller;

class QuestionController extends Controller
{
    
// -------------------------------------------------- FONCTIONS KILIAN -------------------------------------------------- \\

	public function search($result, $orderby="") {
		$manager = new QuestionManager();
		$manager2 = new TagManager();
		if ($orderby == 'titre') {
			$questions = $manager->getQuestions($result, 'titre');
		} elseif ($orderby == 'description') {
			$questions = $manager->getQuestions($result, 'description');
		} elseif ($orderby == 'date') {
			$questions = $manager->getQuestions($result, 'date');
		} elseif ($orderby == 'nbreponses') {
			$questions = $manager->getQuestions($result, 'nbreponses');
		} else {
			$questions = $manager->getQuestions($result);
		}
		$tags = array();
		foreach ($questions as $value) {
			$tags[] = $manager2->getTags($value['id']);
		}
		$manager3 = new ProfilManager();
		$profils = $manager3->getAllUsers();
		$this->show('default/home', ['questions' => $questions, 'tags' => $tags, 'result' => $result, 'profils' => $profils, 'orderby' => $orderby]);
	}

	public function question($id) {
		$manager = new QuestionManager();
		$manager2 = new TagManager();
		$manager3 = new ProfilManager();
		$manager4 = new ReponseManager();
        $manager5 = new Wusers_tagManager();
		$question = $manager->getQuestion($id);
		$tags = $manager2->getTags($id);
		$profils = $manager3->getAllUsers();
		$answers = $manager4->getAllAnswers($id);
        foreach ($answers as $answer) {
            $wusers_id = $answer['wusers_id'];
            $badges[$answer['id']] = $manager5->getUserLevel($wusers_id);
        }
		$this->show('default/question', ['question' => $question, 'tags' => $tags, 'profils' => $profils, 'answers' => $answers, 'badges' => $badges]);
	}

	public function vote($qid, $aid, $vote) {
		$manager = new ReponseManager();
        $manager2 = new Questions_tagManager();
        $manager3 = new Wusers_tagManager();
		$manager->setVote($aid, $vote);
        $wid = $manager->getAnswer($aid);
        $tags = $manager2->getQuestionTags($qid);
        $manager3->setWusersTagsModif($wid, $tags, $vote);
		$this->redirectToRoute('question', ['id' => $qid]);
	}
    
    public function orderBy($orderby) {
        $manager = new QuestionManager();
        $manager2 = new TagManager();
        $manager3 = new ProfilManager();
        $questions = $manager->getAllQuestions($orderby);
        $tags = array();
		foreach ($questions as $value) {
			$tags[] = $manager2->getTags($value['id']);
		}
        $profils = $manager3->getAllUsers();
        $this->show('default/home', ['questions' => $questions, 'tags' => $tags, 'profils' => $profils, 'orderby' => $orderby]);
    }
    
// -------------------------------------------------- FIN FONCTIONS KILIAN -------------------------------------------------- \\
    
}