<?php
namespace smsm_mvc\core\controllers;

use smsm_mvc\core\app\Application;
use smsm_mvc\core\app\cookie;
use smsm_mvc\core\app\encryptDecrypt;
use smsm_mvc\core\models\loginModel;

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
            $this->response->redirect("/smsm_mvc/login");
        }
    


    }



}