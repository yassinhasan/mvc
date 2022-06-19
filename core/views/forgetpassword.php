<div class="reset_password row justify-center" >

<?php

    $this->view->startPostForm($model , "/forgetPassword/resetPassword");
    $this->view->renderInput( ["email" => "Type Your Email" ]
                                , "email" );
    $this->view->getFlashMsg('success');                            
    $this->view->renderSubmitBtn(["name" => "send" , 
                                "class" => "primary reset_password_btn" ,
                                "data" => "data_target='/forgetPassword'" ,
                                "label" => "Send Reset Password"]);
    $this->view->endForm();
?>
</div>