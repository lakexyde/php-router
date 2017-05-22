<?php
class Router {
  private $routes = array();
  private $params = array();
  
  public function __construct(){}
  
  public function get($pattern, $callback){
    $this->map("GET", $pattern, $callback);
  }
  
  public function post($pattern, $callback){
    $this->map("POST", $pattern, $callback);
  }
  
  public function delete($pattern, $callback){
    $this->map("DELETE", $pattern, $callback);
  }
  
  public function put($pattern, $callback){
    $this->map("PUT", $pattern, $callback);
  }
  
  public function map($method, $pattern, $callback){
    if($_SERVER['REQUEST_METHOD'] == $method){
      $this->routes[$pattern] = $callback;
    }
  
  }
  public function run($uri){
    $uri = $_GET['url'];
    foreach($this->routes as $pattern => $callback){
      $route_pattern = $this->convertToRegex($route);
      if(preg_match($route_pattern, $uri, $params)){
        array_shift($params);
        return call_user_func_array($callback, array_values($params));
      }
    }
  }
  
  private function convertToRegex($route) {
    return '@^' . preg_replace_callback("@{([^}]+)}@", function ($match) {
        return $this->regexParam($match[1]);
    }, $route) . '$@';
  }
  
   private function regexParam($name) {
      if ($name[strlen($name) - 1] == '?') {
          $name = substr($name, 0, strlen($name) - 1);
          $end = '?';
      } else {
          $end = '';
      }
      $pattern = isset($this->params[$name]) ? $this->params[$name] : "[^/]+";
      return '(?<' . $name . '>' . $pattern . ')' . $end;
    }
}
?>
