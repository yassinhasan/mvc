<?php 
namespace Mvc\core\controllers;

use Mvc\core\app\Application;

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