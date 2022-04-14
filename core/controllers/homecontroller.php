<?php
namespace smsm_mvc\core\controllers;

use smsm_mvc\core\app\Application;

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