<?php

  require('router.php');
  
  $app = new Router();
  
  // Matches the Homepage
  $app->get('/\A\z/', function(){
    echo "You are Home!";
    // You can also include a file
  });
  
  // Matches /blog
   $app->get('/^blog/', function($name, $id){
    echo "Blog Home";
  });
  
  // Matches any word character (alphanumeric & underscore) e.g blog/posts
  $app->get('/^blog\/(\w+)/', function($h){
    echo "Blog: $h";
    // You can also include a file
  });
  
 // Matches any digit character (0-9). Equivalent to [0-9] e.g posts/1
  $app->get('/^posts\/(\d+)/', function($id){
    echo "Hello World:  $id";
  });
  
  // Runs the $app instance
  $app->run();
  
  
 /*
 / = /\A\z/
 blog/ = /^blog/
 blog/hello = /^blog\/(\w+)/
 blog/1 = /^blog\/(\d+)/
 
 */
?>
