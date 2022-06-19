<?php
namespace core\controllers;

use core\app\Application;

class authenticateController extends abstractController

{
    public static function isLogged()
    {
        return Application::$app->session->userId != null ? true : false;
    }
}