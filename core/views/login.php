<?php

    $this->view->startPostForm($model);
    $this->view->renderInput( ["email" => "Type Your Email" ]
                                , "email" );
    $this->view->renderInput( ["password" => "Type Your Password"]
                                , "password");
    $this->view->renderCheckBtn("rememberMe" , "yes" , "rememberMe");
    $this->view->renderSubmitBtn(["name" => "save" , 
                                "class" => "primary" ,
                                "data" => "" ,
                                "label" => "login"]);
    $this->view->endForm();
?>
