<?php 
namespace smsm_mvc\core\app;

use smsm_mvc\core\database\Database;
use smsm_mvc\core\database\MigrationsClass;
use smsm_mvc\core\controllers\accessController;

class Application 
{

    public $session;
    public $router;
    public $request;
    public $response;
    public $validate;
    public $view;
    public $cookie;
    public $migrations;
    public Database $fb;
    public static $app;
    public function __construct(array $config)
    {   
        static::$app =$this;
        $this->session = new customSession();
        $this->cookie = new cookie();
        $this->request = new Rrequest();
        $this->validate = new Validate();
        $this->view = new View();
        $this->router = new Router();
        $this->request = new Rrequest();
        $this->response = new Response();
        $this->db      = new Database($config);
        $this->migrations = new MigrationsClass();
    }

    public function run()
    {
        $access = new accessController();
        $access->isLogged();
        $this->response->resolve();
    }
}