<?php
namespace smsm_mvc\core\controllers;

use smsm_mvc\core\app\Application;

class authenticateController extends abstractController

{
    public static function isLogged()
    {
        return Application::$app->session->userId != null ? true : false;
    }
}