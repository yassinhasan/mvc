<?php

namespace smsm_mvc\core\controllers;

use smsm_mvc\core\app\Application;
use smsm_mvc\core\controllers\abstractController;


class accessController extends abstractController
{

    public $excpetions = [

        "/login",
        "/register",
        "/forgetPassword",
        "/forgetPassword/resetPassword"
    ];
    public  function isLogged()
    {

        $currentPath = Application::$app->request->currentPath;
        $isLogged = authenticateController::isLogged();
        if (!in_array($currentPath, $this->excpetions) AND !$isLogged) {
            $this->response->redirect("/smsm_mvc/login");
        }
    }
}
