<?php
namespace Mvc\core\models;

use Mvc\core\app\Application;
use Mvc\core\app\Response;
use Mvc\core\app\Validate;

abstract class abstractModel 
{
    protected const FIELD__REQUIRED = "required"; 
    protected const FIELD__STRING = "string"; 
    protected const FIELD__EMAIL = "email";
    protected const FIELD__MIN = "min";
    protected const FIELD__MAX = "max";
    protected const FIELD__MATCHED = "matched";
    protected const FIELD__UNIQUE = "unique";

    protected $rules = [];
    public $pdo;
    abstract public function rules();
    public function __construct()
    {
        $this->pdo = Application::$app->db->pdo;
    }

    public function __call($name, $arguments)
    {
    //    return  Application::$app->db->$name($arguments);
       return call_user_func_array([Application::$app->db , $name ], $arguments);
    }

    public function getById($primaryKey)
    {
        $sql = " SELECT * FROM ".get_called_class()::$tableName." WHERE ".get_called_class()::$primaryKey." = ? ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1 , $primaryKey);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS);
        return $result;

    }

    public function getAll()
    {
        $results =  $this->from(get_called_class()::$tableName)->select()->fetchAll();
        return $results;
    }



}