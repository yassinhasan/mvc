<h1>  <?php

use smsm_mvc\core\app\Application;

echo $title ; ?> </h1>
<?php 
    if($this->session->hasFlashMsg("success") ) 
    {?>
    
        <div class="alert alert-success" role="alert">
         <a href="#" class="alert-link"><?= $this->session->pull("success")["msg"]?></a>
        </div>
    <?php }
?>
