<?php
namespace smsm_mvc\core\app;
class Rrequest
{
    private $get = "GET";
    private $post = "POST";
    public $currentPath = null;

    public function __construct()
    {
        $this->getPath();
    }
    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    
    public Function isGet()
    {
       return $_SERVER['REQUEST_METHOD'] == $this->get;
    }
    public Function isPost()
    {
       return $_SERVER['REQUEST_METHOD'] == $this->post;
    }

    public function getPath()
    {
        $path = "";

        if(isset($_SERVER["REQUEST_URI"]))
        {
            
            $path =  str_replace("/smsm_mvc","",$_SERVER["REQUEST_URI"] );
            $position = strpos($path , "?");
         
            if($position != false)
            {
              
                $path = substr($path,0,$position);
            }
            
        }
        $this->currentPath = $path;
        return $path;
    }
    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getBody()
    {
        return $_POST;
    }
    public function baseUrl()
    {
        $protocol = $_SERVER['HTTP_X_FORWARDED_PROTO'] ?? null;
        $http_host = $_SERVER['HTTP_HOST'] ?? null;
        $script_name = $_SERVER['SCRIPT_NAME'] ?? null;
        if($script_name)
        {
            $script_name = str_replace("index.php" , "" , $script_name);
        }
        
        if($protocol AND $http_host AND $script_name)
        {
             return $protocol."://".$http_host.$script_name;
        }else
        {
            return "../../../";
        }
       
    }

    public function publicUrl()
    {
        return $this->baseUrl()."public/";
    }
    public function cssUrl($file)
    {
        return $this->baseUrl()."public/css/$file.css";
    }
    public function jsUrl($file)
    {
        return $this->baseUrl()."public/js/$file.js";
    }
} 
