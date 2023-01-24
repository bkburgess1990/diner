<?php
//controller

//turn of error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//require autoload file
require_once('vendor/autoload.php');

//Instantiate F3 base class
$f3 = Base::instance();

//define route
$f3->route('GET /', function () {

    //instantiate a view
    $view = new Template();
    echo $view->render("views/dinerHome.html");
});

//define breakfast route
$f3->route('GET /breakfast', function () {

    //instantiate a view
    $view = new Template();
    echo $view->render("views/breakfast.html");
});

//define lunch route
$f3->route('GET /lunch', function () {

    //instantiate a view
    $view = new Template();
    echo $view->render("views/lunch.html");
});

//define a lunch route & page. Add image to both

//run fat free
$f3->run();


