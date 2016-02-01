<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\PostManager;
use \Manager\ConnectManager;
use \W\Manager\UserManager;
use Manager\QuestionManager;
use Manager\TagManager;
use Manager\WuserManager;
use Manager\ProfilManager;
use Manager\Wusers_tagManager;
use \W\Security\AuthentificationManager;

class DefaultController extends Controller
{

    // -------------------------------------------------- FONCTIONS KILIAN -------------------------------------------------- \\

    public function home() {
        $manager = new QuestionManager();
        $manager2 = new TagManager();
        $manager3 = new ProfilManager();
        $questions = $manager->getAllQuestions();
        $tags = array();
        foreach ($questions as $value) {
            $tags[] = $manager2->getTags($value['id']);
        }
        $profils = $manager3->getAllUsers();
        $this->show('default/home', ['questions' => $questions, 'tags' => $tags, 'profils' => $profils]);
    }

    public function recupPost() {
        if (isset($_POST['search'])) {
            $result = $_POST['result'];
            $this->redirectToRoute('search', ['result' => $result]);
        }
        $this->show('default/home');
    }

    public function recupVote() {
        if (isset($_POST['submit']) || isset($_POST['submit2'])) {
            $qid = $_POST['qid'];
            $aid = $_POST['aid'];
            $vote = $_POST['vote'];
            $this->redirectToRoute('vote', ['qid' => $qid, 'aid' => $aid, 'vote' => $vote]);
        }
        $this->show('default/question', ['id' => $qid]);
    }

    // -------------------------------------------------- FIN FONCTIONS KILIAN -------------------------------------------------- \\

    public function profil()
    {
        $this->show('default/profil');
    }

    public function post($id)
    {
        $manager = new PostManager();
        $post = $manager->find($id);
        $this->show('default/post', ['post' => $post]);
    }

    public function delete($id)
    {
        $this->allowTo('admin');
        $manager = new PostManager();
        $post = $manager->delete($id);
        // redirige vers une page interne
        $this->redirectToRoute('home');
    }

    public function edit($id)
    {
        $this->allowTo('admin');
        $manager = new PostManager();
        if(isset($_POST['edit'])) {
            $manager->update($_POST['myform'], $id);
            $this->redirectToRoute('home');
        }
        $post = $manager->find($id);
        $this->show('default/edit', ['post' => $post]);
    }

    public function create()
    {
        $this->allowTo('admin');
        if(isset($_POST['create'])) {
            $manager = new PostManager();
            $manager->insert($_POST['myform']);
            $this->redirectToRoute('home');
        }
        $this->show('default/create');
    }

    public function register() 
    {
        $errors = array();
        $flag = 0;
        //debug($_POST);
        if(isset($_POST['registerform']))
        {
            //debug($_POST['registerform']);
            // indication du role par défaut de l'utilisateur
            $_POST['myform']['role'] = 'user';  

            //nom
            $nom = $_POST['nom'];

            //prénom
            $prenom = $_POST['prenom'];

            // Hashage du mot de passe
            $_POST['myform']['mdp'] = password_hash($_POST['myform']['mdp'], PASSWORD_DEFAULT);

            $manager = new UserManager(); 
            $manager2 = new ProfilManager();
            $manager3 = new WuserManager();
            $manager4 = new TagManager();
            $manager5 = new Wusers_tagManager();

            // Si le mail et sa confirmation sont différents
            if ($_POST['myform']['mail'] != $_POST['remail'])
            {
                $errors[] = 'Les adresses mail entrées sont différentes.';
            }
            else
            {  
                // Si l'adresse mail existe en bdd
                if ($manager->getUserByUsernameOrEmail($_POST['myform']['mail']))
                {
                    $errors[] = '<br />Cette adresse mail est déjà utilisée, veuillez en choisir une autre ou vous connecter à ce compte.';
                }
                else
                {
                    if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['myform']['mail']))
                    {
                        $errors[] = '<br />L\'adresse mail ne respecte pas les critères de validité.';
                    }
                    else
                    {
                        $_POST['myform']['mail'];
                    }
                }
            }//mail 


            // Si le mot de passe fait moins de 8 caractères
            // A FAIRE
            // Si le mot de passe et sa confirmation sont diférents
            if ($_POST['myform']['mdp'] != password_verify($_POST['remdp'], $_POST['myform']['mdp']))
            {
                $errors[] = 'Les mots de passe entrés sont différents.';
            }//mdp




            // Création du token pour validation du compte par mail
            $token = md5(uniqid($_POST['myform']['pseudo'], true));

            if(count($errors) === 0)
            { 
                // error = 0 = insertion user     
                //$this->redirectToRoute('login');
                try {
                    $manager->insert($_POST['myform']);
                    $manager2->insertUserData($_POST['myform']['mail'], $nom, $prenom, $token);
                    //debug('compte en bdd');
                    $flag = 1;
                    $wuser_id = $manager3->getWuserId($_POST['myform']['mail']);
                   // debug($wuser_id);
                    $tags = $manager4->getAllTags();
                    $manager5->setWusersTags($wuser_id, $tags);
                    $this->show('default/home', ['flag' => $flag]);
                } catch(Exception $e) {
                    $this->show('default/home', ['errors' => $errors->getMessage()]);
                }
            }
            else
            {
                $this->show('default/home', ['errors' => $errors], ['flag' => $flag]);
            }
        }
        $this->show('default/home', ['flag' => $flag]);
    }

    public function login() 
    {
        $flagl = 0;
        $manager2 = new ProfilManager();

        if(isset($_POST['loginform']))
        {
            $auth = new AuthentificationManager();
            $userManager = new UserManager();

            if($auth->isValidLoginInfo($_POST['myform']['mail'], $_POST['myform']['mdp']))
            {
                $user = $userManager->getUserByUsernameOrEmail($_POST['myform']['mail']);
                $result=$auth->logUserIn($user);
                $flagl = 1;
                $manager2->userIsOnline($user['id']);
                $this->redirectToRoute('home', ['flagl' => $flagl]);
            }
            else
            {

                $error = 'Connexion impossible.';
                $this->show('default/home', ['error' => $error]);
            }
        }

        $this->show('default/home', ['flag' => $flag]);
    }

    public function logout()
    {
        $manager2 = new ProfilManager();
        $manager2->userIsOffline($_SESSION['user']['id']);
        $auth = new AuthentificationManager();
        $auth->logUserOut();
        $this->redirectToRoute('home');
    }


    public function countQ()
    {
        $manager = new QuestionManager();
        $countQ = $manager->countQuestions();
        //debug($countQ);die();
        $this->show('default/home', ['countQ' => $countQ]);
    }

    public function newQ()
    {
        $tag[] = array();
        $manager = new QuestionManager();
        if(isset($_POST['newquestionform']))
        {
            $_SESSION['msg']['titre'] = $_POST['newqtitre'];
            $_SESSION['msg']['desc'] = $_POST['newqdesc'];
            //$_SESSION['msg']['tag'] = A FAIRE 
            if (!empty($_POST['newqtitre']) && !empty($_POST['newqtitre']) && !empty($_POST['newqtitre']))
            {
                $id = $_SESSION['user']['id'];
                $titre = $_POST['newqtitre'];
                $description = $_POST['newqdesc'];

                $tag = $_POST['tag'];
                $manager->newQuestion($id, $titre, $description, $tag);
                $this->redirectToRoute('home');
            }
            else
            {
                $errormsg = 'Veuillez remplir tous les champs pour valider votre question.';
                $this->show('default/home', ['errormsg' => $errormsg]);
            }
        }



    }
    public function newR()
    {
        $manager = new QuestionManager();
        //debug($_POST['reponsearea']);die();
        if(isset($_POST['newreponseform']))
        {
           
            if (!empty($_POST['reponsearea']))
            {
                $questions_id = $_POST['id'];
                $message = $_POST['reponsearea'];
                $manager->newReponse($questions_id, $message);
                //debug($questions_id);debug($message);die();
                $this->redirectToRoute('question', ['id' => $questions_id]);
                
            }
            //else
            //{
                //$errorreponse = 'La réponse ne peut être vide';
                //$this->show('default/question', ['errorreponse' => $errorreponse]);
            //}

        }
    }

}




