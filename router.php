<?php
class Router {
  private $routes = array();
  
  public function __construct(){}
  
  public function get($pattern, $callback){
    $method =  $_SERVER['REQUEST_METHOD'];
    if($method == 'GET'){
      $this->routes[$pattern] = $callback;
    }
  }
  
  public function post($pattern, $callback){
    $method =  $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
      $this->routes[$pattern] = $callback;
    }
  }
  
  public function delete($pattern, $callback){
    $method =  $_SERVER['REQUEST_METHOD'];
    if($method == 'DELETE'){
      $this->routes[$pattern] = $callback;
    }
  }
  
  public function put($pattern, $callback){
    $method =  $_SERVER['REQUEST_METHOD'];
    if($method == 'PUT'){
      $this->routes[$pattern] = $callback;
    }
  }
  
  public function run($uri){
    $uri = $_GET['url'];
    foreach($this->routes as $pattern => $callback){
      if(preg_match($pattern, $uri, $params)){
        array_shift($params);
        return call_user_func_array($callback, array_values($params));
      }
    }
  }
}
?>