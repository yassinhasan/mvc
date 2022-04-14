<?php 
namespace smsm_mvc\core\controllers;

use smsm_mvc\core\app\Application;

class userInfoController extends abstractController 
{
    public static function user()
    {
        if(Application::$app->session->user)
        {
            return Application::$app->session->user;
        }
      
    }
}