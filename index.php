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



//run fat free
$f3->run();


