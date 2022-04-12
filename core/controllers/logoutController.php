<?php
namespace Mvc\core\controllers;

use Mvc\core\app\Application;
use Mvc\core\app\cookie;
use Mvc\core\app\encryptDecrypt;
use Mvc\core\models\loginModel;

class logoutController extends abstractController
{
    use encryptDecrypt;
    public function __construct()
    {
        
        parent::__construct();
        $this->data['model'] = $this->model;
    }

    public function logout()
    {

        if($this->request->method() == "GET")
        {
         
            if(($this->session->user))
            {
                $this->cookie->kill("loginCode");
                $this->session->kill();
            }
            $this->response->redirect("/mvc/login");
        }
    


    }



}