<?php
namespace Mvc\core\controllers;

use Mvc\core\app\Application;

class authenticateController extends abstractController

{
    public static function isLogged()
    {
        return Application::$app->session->user != null ? true : false;
    }
}