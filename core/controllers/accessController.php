<?php

namespace Mvc\core\controllers;

use Mvc\core\app\Application;
use Mvc\core\controllers\abstractController;


class accessController extends abstractController
{

    public $excpetions = [

        "/login",
        "/register",
    ];
    public  function isLogged()
    {

        $currentPath = Application::$app->request->currentPath;
        $isLogged = authenticateController::isLogged();
        if (!in_array($currentPath, $this->excpetions) AND !$isLogged) {
            $this->response->redirect("/mvc/login");
        }
    }
}
