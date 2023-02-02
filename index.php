<?php
//controller



//turn of error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Start session
session_start();

//require autoload file
require_once('vendor/autoload.php');

//Instantiate F3 base class
$f3 = Base::instance();

//define route
$f3->route('GET|POST /', function () {

    //instantiate a view
    $view = new Template();
    echo $view->render("views/dinerHome.html");
});

//define breakfast route
$f3->route('GET|POST /breakfast', function () {

    //instantiate a view
    $view = new Template();
    echo $view->render("views/breakfast.html");
});

//define lunch route
$f3->route('GET|POST /lunch', function () {

    //instantiate a view
    $view = new Template();
    echo $view->render("views/lunch.html");
});

//define order form route
$f3->route('GET|POST /order', function($f3) {

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['food'] = $_POST['food'];
        $_SESSION['meal'] = $_POST['meal'];

        $f3->reroute('summary');
    }

    //instantiate a view
    $view = new Template();
    echo $view->render("views/orderForm1.html");
});

$f3->route('GET|POST /summary', function($f3) {
    //instantiate a view
    $view = new Template();
    echo $view->render("views/orderSummary.html");
});

$f3->route('GET|POST /orderForm2', function($f3) {
    //instantiate a view
    $view = new Template();
    echo $view->render("views/orderForm2.html");
});

//define a lunch route & page. Add image to both

//run fat free
$f3->run();


