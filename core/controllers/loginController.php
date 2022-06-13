<?php
namespace smsm_mvc\core\controllers;

use smsm_mvc\core\app\Application;
use smsm_mvc\core\app\cookie;
use smsm_mvc\core\app\encryptDecrypt;
use smsm_mvc\core\models\loginModel;

class loginController extends abstractController
{
    use encryptDecrypt;
    public function __construct()
    {
        
        parent::__construct();
        $this->model = new loginModel;
        $this->data["title"] = "login";
        $this->data['model'] = $this->model;
        $this->data['links'] = [
            "css" => ["login"] ,
            "js" => ["login" ]
        ];
    }


    // check if post then check data else if view this page 
    public function login()
    {
        // if request method is get so show page else if show respnse from form 
        if($this->request->method() == "POST")
        {
            if ($this->valid($this->model->rules() , $this->request->getBody()) )
            {
                $user = $this->model->findUser();
                if ($user) 
                {
                    $rememberMe = isset($this->request->getBody()["rememberMe"]) ?? null ;
                    $password =  $this->request->getBody()['password'];
                    $hashedUsername = $this->encrypt($user->firstName.$user->lastName);
                    if(password_verify($password , $user->password ))
                    {
                        if($rememberMe and $rememberMe =="yes")
                        {
                            
                            $this->cookie->setCookie("loginCode" ,  $hashedUsername);
                        }else
                        {
                              $this->session->loginCode =  $hashedUsername;                        
                        }
                        $this->session->userId = $user->id;
                        $this->session->setFlashMsg("success" , " you have login succuflly");
                        $this->response->redirect("/smsm_mvc/home");
                    }else
                    {
                        $this->validate->addCustomError("password" , "sorry this Password is not matched");
                    }
                }else
                {
                    $this->validate->addCustomError("email" , "sorry this Email does not exists");
                }
                $this->data['errors'] =  $this->validate->getErrors();
                $this->response->renderView("login" , $this->data );
            }
        }else
        {
            $this->response->renderView("login" ,$this->data );
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
            $this->response->renderView("login" , $this->data );
        }
    }




}