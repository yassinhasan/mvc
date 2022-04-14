<?php 
namespace smsm_mvc\core\app;
class Validate 
{

    public $request;
    public function __construct()
    {
        
        $this->request = Application::$app->request;
    }
    protected $error = [];

    public function required($field , $value , $message = null)
    {
       if($value == "")
           $this->error[$field][] = "sorry $field is required"; 

      
    }
    public function email($field , $value)
    {
       if(! filter_var($value,FILTER_VALIDATE_EMAIL))
       $this->error[$field][] = "sorry $field is not valid email";
    }
    public function string($field , $value)
    {
        $pattern = "/^([a-zA-Z][a-zA-Z\\d]*)$/";
        if(preg_match($pattern , $value) == false)
        $this->error[$field][] = "sorry $field is must be string";
    }
    public function min($field , $value , $matched)
    {
        if(strlen($value) < $matched )
        {
            $this->error[$field][] = "sorry $field is must be less than $matched";
        }
      
    }
    public function max($field , $value , $matched)
    {
        if(strlen($value) > $matched )
        {
            $this->error[$field][] = "sorry $field is must be more than $matched";
        }
      
    }
    public function matched($field , $value , $matched)
    {
        $matchedValue = $this->request->getBody()[$matched];
        if($value !== $matchedValue )
        {
            $this->error[$field][] = "sorry $field is must be equal to  $matched";
        }
      
    }
    public function unique($field , $value , $matched)
    {

        $table = $matched[0];
        $matched = $matched[1];
        $sql = " SELECT $field FROM $table WHERE $field =  ?  ";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->bindValue(1 , $value , \PDO::PARAM_STR);
        $stmt->execute();
        $findUser = $stmt->fetchAll(\PDO::FETCH_CLASS);
        if($findUser)
        {
            $this->error[$field][] = "sorry this ".ucfirst( $field) ." is exists before "; 
        }
      
    }


    public function getErrors()
    {
        return $this->error;
    }
    
    public function isValid($class , $allRules , $data)
    {
        
        foreach($allRules as $field=>$rules)
        {
            $filed_name = $field;
            $filed_value =  $data[$filed_name];
           $class->{$filed_name} = $filed_value;
            foreach($rules as $rule)
            {
               
                if(is_array($rule))
                {
                   
                   foreach($rule as $key => $macted)
                   {
                       
                       
                       $this->$key($filed_name , $filed_value , $macted);
                   }
                }else
                {  
                    $this->$rule($filed_name , $filed_value );
                }
                
              
            }   

        }
        return empty($this->error);
    }

    public function printClass($filed_name)
    {
               
        return $this->hasError($filed_name) ? "is-invalid" : '';

  
    }
    public function printُُُErrorMessage($filed_name)
    {

        $errorMessage = $this->getFirstError($filed_name);
        return $this->hasError($filed_name) ?  "<div class='invalid-feedback'>$errorMessage</div>" : '';

    }

    public function getFirstError($filed_name)
    {
      
       return $this->hasError($filed_name) ? $this->error[$filed_name][0] : false;

    }
    
    public function hasError($filed_name)
    {
        
       if(!empty($this->getErrors()))
       {
          
        return array_key_exists($filed_name , $this->getErrors()) ;
       }

    }

    public function addCustomError($field , $message)
    {
        $this->error[$field][] = $message; 
    }
}