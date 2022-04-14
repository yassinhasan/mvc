<?php
namespace smsm_mvc\core\controllers;

use smsm_mvc\core\app\Router;
use smsm_mvc\core\app\Application;

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