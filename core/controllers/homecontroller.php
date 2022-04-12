<?php
namespace Mvc\core\controllers;

use Mvc\core\app\Application;

class homecontroller extends abstractController
{


    public function home()
    {

        $data = [
            "title" => "home"
        ];
        $this->response->renderView("home" ,$data );
    }
}