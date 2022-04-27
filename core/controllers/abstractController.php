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
    protected $jData = [];
    public function __construct()
    {
        $this->response =   Application::$app->response;
        $this->request =   Application::$app->request;
        $this->validate =   Application::$app->validate;
        $this->session =   Application::$app->session;
        $this->cookie =   Application::$app->cookie;
    }

    public function json()
    {
      echo  json_encode($this->jData , JSON_PRETTY_PRINT);
      
    }
}