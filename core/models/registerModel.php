<?php
namespace smsm_mvc\core\models;

use smsm_mvc\core\app\Rrequest;

class registerModel extends abstractModel
{
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $confirmPassword;
    static public $tableName = "app_users";
    public function rules()
    {
        return $this->rules = [
            'firstName'=>[ self::FIELD__REQUIRED , self::FIELD__STRING],
            'lastName' => [self::FIELD__REQUIRED , self::FIELD__STRING],
             'email'=> [
                        self::FIELD__REQUIRED , self::FIELD__EMAIL  ,
                        [self::FIELD__UNIQUE =>[self::$tableName, "email"] ]
                        ] , 
             'password'=> [self::FIELD__REQUIRED , [self::FIELD__MIN => 4 ] , [self::FIELD__MAX => 12 ]],
            'confirmPassword'=> [self::FIELD__REQUIRED , [self::FIELD__MATCHED => "password"]]

        ];

    }

    //create users
    public function saveUser()
    {
        $this->data([
            "firstName" => $this->firstName ,
            "lastName" => $this->lastName ,
            "email" => $this->email ,
            "password" =>  password_hash($this->password , PASSWORD_DEFAULT),
        ])->insert(self::$tableName);
        return true;
    }
}