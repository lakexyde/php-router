# php-router : A simple PHP router class
This is a simple router class that uses regular expressions (regex) to map url parameters to a callback function. It is RESTful as it supports basically the magnificent four(4) **PHP Request Methods** which is also extensible.

## Installation
Copy the **router.php** file into your project's folder and require it in your **index.php** file.

## Usage

### Require router.php
```php
require 'router.php';

```
### Create a new instance of the Router class

```php
$app = new Router();
```
### Route GET requests
```php
$app->get('', function(){
    echo "Homepage"; // prints "Homepage"
});

$app->get('blog/{p}', function($p){
    echo "Blog: $p"; // url: blog/posts prints "Blog: posts"
});
```
### Same for other Request Methods
```php
$app->post('', function(){
    echo "Post Request"; // prints "Post Request" when you make a POST request to the homepage
});

$app->put('', function(){
    echo "Put Request"; // prints "Put Request" when you make a PUT request to the homepage
});

$app->delete('posts/{id}', function($id){ // url: posts/1
    echo "Deleted post with id: $id"; // prints "Deleted post with id: 1" when you make a posts request to the homepage
});

```

[You can learn more about regex here](http://regexr.com/ "RegExr: Learn, build & test RegEx")

## Inspired by
* [Slim Framework](http://www.slimframework.com/ "Slim Framework")

## TODO
* Custom HTTP Request and Response class
* Define parameters pattern
* Error handling
