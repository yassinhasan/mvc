<?php
namespace smsm_mvc\core\controllers;

use smsm_mvc\core\app\Application;
class notfoundController extends abstractController
{


    public $data = [
        "title" => "notfound"
    ];
    public function notfound()
    {
       
        $this->response->renderView("notfound" , $this->data);
    }
}