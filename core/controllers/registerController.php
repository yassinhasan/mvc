<?php
namespace core\controllers;

use core\app\Application;
use core\models\registerModel;

class registerController extends abstractController
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new registerModel;
        $this->data["title"] = "register";
        $this->data['model'] = $this->model;
        $this->data['links'] = [
            "css" => ["register"]
        ];
    }


    // check if post then check data else if view this page 
    public function register()
    {
        // if request method is get so show page else if show respnse from form 
        if($this->request->method() == "POST")
        {
            if ($this->valid($this->model->rules() , $this->request->getBody()) )
            {
                if ($this->model->saveUser()) 
                {
                    $this->session->setFlashMsg("success" , "your registration done");
                    $this->response->redirect("smsm_mvc/");
                    exit;
                }
            }
        }else
        {
                $this->response->renderView("register" ,$this->data );
        }
    


    }

    // check valid data vs rules for this model 

    public function valid( $rules , $data)
    {
        if( $this->validate->isValid( $this->model , $rules , $data))
        {
           return true;
        }else
        {
            $this->data['errors'] =  $this->validate->getErrors();
            $this->response->renderView("register" , $this->data );
        }
    }

}