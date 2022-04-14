scenario
    router->get() 
    -> then call app->run()
    -> then runn will call response->resolve()
    -> resolve() will call prepareCallback()
    -> if string will call direct renderView 
    -> elseif array here we will make controller of  thiss callback and call response tom make
       function renderView
    -> in renderView() it take 3 args callback , data , excpetion
    ->  in renderView() call 
        -> renderMainLayout() take excpetion and data  
            render nav - layoutstart - layoutend 
        -> rendercontent() render only content take also data 
     return output which is the page    
 
    
first
## $app->router->get("/",[ homecontroller::class , "home"]);

    Router make route that get tow args
        first arg is path like "/" or  "register"
        second arg is call back which may be like [homecontroller class , "home"] home function will be called in controller

## public function run()
{
    $this->response->resolve();
}

    then app class will handle this routes with  Response class

##   public function resolve()
    {
        
        $callback = $this->prepareCallback();
        if callback is string like this "profile " 
        it will call direct function renderView()
        /** 
            $app->router->get("/profile","profile");
            else if like  this 
        */
        if(is_string($callback))
        {
            $this->renderView($callback);
        }
        
        /*
        $app->router->get("/",[ homecontroller::class , "home"]);
            here $callback is homecontroller
            make class if this controller and call function home inside this function
        */

        if(is_array($callback))
        {
            $callback[0] = new $callback[0];
            return call_user_func($callback);
        }
}
    in function resolve 
##    private function prepareCallback()
    {
        $path = strtolower($this->request->getPath());
        $method = strtolower($this->request->getMethod());
        if(array_key_exists($path , $this->router->routes[$method]))
        {
            $callback =  $this->router->routes[$method][$path];
        }
        else
        {
            http_response_code(404);
            $callback  =  $this->router->routes[$method]["/notfound"];
        }
        return $callback;
}
     it will prepare callback 
     with this function 


## until here if call back is string we will call direct renderView function 
    else if is array we will call controller of this callback 
    like this




