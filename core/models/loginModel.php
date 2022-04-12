<?php
namespace Mvc\core\models;

use Mvc\core\app\Rrequest;

class loginModel extends abstractModel
{

    public $email ="";
    public $password = "";
    static public $tableName = "app_users";
    public function rules()
    {
        return $this->rules = [

             'email'=> [
                        self::FIELD__REQUIRED , self::FIELD__EMAIL 
                        ] , 
             'password'=> [self::FIELD__REQUIRED]

        ];

    }

    //create users
    public function findUser()
    {
       
       $findUser =  $this->from(self::$tableName)->where( " email  = ? " , $this->email)->select( " * ")->fetch();
       return $findUser;
    }
}