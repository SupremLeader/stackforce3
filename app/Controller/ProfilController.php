<?php
namespace Controller;

use \W\Controller\Controller;
use \W\Manager\UserManager;
use \Manager\ProfilManager;
use \Manager\WuserManager;
use \Manager\Wusers_tagManager;

class ProfilController extends Controller
{
    
    // -------------------------------------------------- FONCTIONS KILIAN -------------------------------------------------- \\
    
    public function profilModif() {
        $manager = new ProfilManager();
        $manager2 = new WuserManager();
        $manager3 = new UserManager();
        if (isset($_POST)) {
            $id = $_POST['id'];
            $mail = $_POST['mail'];
            $telephone = $_POST['telephone'];
            $facebook = $_POST['facebook'];
            $twitter = $_POST['twitter'];
            $googleplus = $_POST['googleplus'];
            $linkedin = $_POST['linkedin'];
            $github = $_POST['github'];
            $profil = $manager->getUserProfil($id);
            if (empty($mail) || $manager3->getUserByUsernameOrEmail($mail) || !preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) { $mail = $profil['mail']; }
            if (empty($telephone)) { $telephone = $profil['telephone']; }
            if (empty($facebook)) { $facebook = $profil['facebook']; }
            if (empty($twitter)) { $twitter = $profil['twitter']; }
            if (empty($googleplus)) { $googleplus = $profil['googleplus']; }
            if (empty($linkedin)) { $linkedin = $profil['linkedin']; }
            if (empty($github)) { $github = $profil['github']; }
            $manager->setProfilModif($id, $telephone, $facebook, $twitter, $googleplus, $linkedin, $github);
            $manager2->setWuserModif($id, $mail);
            $this->redirectToRoute('profil', ['id' => $id]);
        }
    }
    
    // -------------------------------------------------- FIN FONCTIONS KILIAN -------------------------------------------------- \\
    
    public function profilView($id)
    {
        $manager = new ProfilManager();
        $manager2 = new Wusers_tagManager();
        $profil = $manager->getUserProfil($id);
        $badges = $manager2->getUserLevel($id);
    	//$this->allowTo('user');
        $this->show('default/profil', ['profil' => $profil, 'badges' => $badges]);
    }
 
}