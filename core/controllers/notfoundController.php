<?php
namespace smsm_mvc\core\controllers;

use smsm_mvc\core\app\Application;
class notfoundController extends abstractController
{


    public function notfound()
    {
        $data = [
            "title" => "notfound"
        ];
        echo "notfound hello ";
    }
}