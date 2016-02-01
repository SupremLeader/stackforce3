<?php
namespace Controller;

use \W\Controller\Controller;
use \Manager\AdminManager;

class AdminController extends Controller
{
    public function adminPanel()
    {
    	$this->allowTo('admin');
        $this->show('admin/panel');
    }
}