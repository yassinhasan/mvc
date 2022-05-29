<?php
namespace smsm_mvc\core\controllers;

use smsm_mvc\core\app\Application;
use smsm_mvc\core\app\cookie;
use smsm_mvc\core\app\encryptDecrypt;
use smsm_mvc\core\models\loginModel;

class forgetPasswordController extends abstractController
{
    use encryptDecrypt;
    public function __construct()
    {
        
        parent::__construct();
        $this->model = new loginModel;
        $this->data["title"] = "forget password";
        $this->data['model'] = $this->model;
        $this->data['links'] = [
            "css" => ["foregtpassword"] ,
            "js" => ["foregtpassword" ]
        ];
    }


        // forget password
        public  function forgetPassword()
        {
            $this->response->renderView("forgetpassword" , $this->data );
        }

        /*
            scenario 
            by click on reset password 

            fetch url /smsm_mvc/forgetPassword/resetPassword by post
            then send email to this url 
            and if email is already sent 
            sent suc msg email is already sent and  check your email
            then 
            get email from input
            /////

            when email is sent 
            insert into user where email is found this code

            send code to link 
            /smsm_mvc/forgetPassword/resetPassword?code=-----------
           then whenn code come from email
           select user where code = code if found delete this code
           then show reset password page 
           enter new password 
           change password into db according to this email
            
        */
        public function resetPassword()
        {
            $data = $this->request->getBody();
            pre($data);
        }




}