<?php
namespace Mvc\core\controllers;

use Mvc\core\app\Router;
use Mvc\core\app\Application;

class abstractController
{
    protected $response;
    protected $request;
    protected $session;
    protected $cookie;
    protected $data = [];
    protected $model = null;
    public function __construct()
    {
        $this->response =   Application::$app->response;
        $this->request =   Application::$app->request;
        $this->validate =   Application::$app->validate;
        $this->session =   Application::$app->session;
        $this->cookie =   Application::$app->cookie;
    }
}