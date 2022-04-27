<?php
namespace smsm_mvc\core\models;

use smsm_mvc\core\app\Rrequest;
use smsm_mvc\core\app\Validate;
use smsm_mvc\core\models\abstractModel;
class loginModel extends abstractModel
{

    public $email ="";
    public $password = "";
    static public $tableName = "app_users";
    public function rules()
    {
        return [

             'email'=> [
                        Validate::FIELD__REQUIRED , Validate::FIELD__EMAIL 
                        ] , 
             'password'=> [Validate::FIELD__REQUIRED]

        ];

    }

    //create users
    public function findUser()
    {
       
       $findUser =  $this->from(self::$tableName)->where( " email  = ? " , $this->email)->select( " * ")->fetch();
       return $findUser;
    }
}