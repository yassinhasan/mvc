<?php
namespace smsm_mvc\core\models;

use PDO;
use smsm_mvc\core\app\Validate;

class forgetPasswordModel extends abstractModel 
{

    public $email ="";
    public static $tableName = "app_users";
    public function rules()
    {
        return [
            "email" => [Validate::FIELD__REQUIRED , Validate::FIELD__EMAIL]
        ];
    }

    public function isValidEmail($email)
    {
      $stmt = $this->pdo->prepare("SELECT `email` FROM ".self::$tableName." WHERE email =  ? " );
      $stmt->bindValue(1 , $email , PDO::PARAM_STR);
      if($stmt->execute())
      {
          $results= $stmt->fetchAll(PDO::FETCH_CLASS);
          $result = array_shift($results);
         return ($result !== null);
      }
    }




}