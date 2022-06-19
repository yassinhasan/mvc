<?php

    $this->view->startPostForm($model);
    $this->view->renderInput( ["email" => "Type Your Email" ]
                                , "email" );
    $this->view->renderInput( ["password" => "Type Your Password"]
                                , "password");
    $this->view->renderCheckBtn("rememberMe" , "yes" , "rememberMe");
?>
    <a href="/forgetPassword" style="margin:10px 0;display:inline-block"> Forget Password </a>
    <br>
<?php    $this->view->renderSubmitBtn(["name" => "save" , 
                                "class" => "primary" ,
                                "data" => "" ,
                                "label" => "login"]);
    $this->view->endForm();
?>
