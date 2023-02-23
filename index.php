<?php
//controller

//turn of error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);



//require autoload file
require_once('vendor/autoload.php');
//var_dump(getMeals());

//Start session AFTER requiring autoload
session_start();

//$myOrder = new Order();
//$myOrder->setFood("Tacos ");
//echo $myOrder->getFood();
////var_dump($myOrder);
//$myOrder->setMeal("Number 2 ");
//echo $myOrder->getMeal();
//$myOrder->setCondiments("Hella Ketchup");
//echo $myOrder->getCondiments();
//$food1 = "tacos";
//$food2 = "";
//$food3 = "x";
//echo validFood($food1) ? "valid " : "not valid ";
//echo validFood($food2) ? "valid " : "not valid ";
//echo validFood($food3) ? "valid " : "not valid ";

//Instantiate F3 base class
$f3 = Base::instance();

//instantiate controller object
$con = new Controller($f3);

//define route
$f3->route('GET|POST /', function () {
    $GLOBALS['con']->home();
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
        $food = trim($_POST['food']);
        if(Validation::$food){
            $_SESSION['food'] = $food;
        }
        else{
            $f3->set('errors["food"]', 'Food must have at least 2 characters.');
        }
        $_SESSION['meal'] = $_POST['meal'];

        //if no errors
        if(empty($f3->get('errors'))) {
            $f3->reroute('orderForm2');
        }

        //validate meal
        $meal = $_POST['meal'];
        if(Validation::validFood($food)) {
            $_SESSION['meal'] = $meal;
        }
        else{
            $f3->set('errors["meal"])', 'Meal is Invalid');
        }

        if(empty($f3->get('errors'))) {
            $f3->reroute('orderForm2');
        }
    }
    //Add meals to f3 hive
    $f3->set("meals", DataLayer::validMeal(getMeals()));

    //instantiate a view
    $view = new Template();
    echo $view->render("views/orderForm1.html");
});



$f3->route('GET|POST /orderForm2', function($f3) {
    //Add meals to f3 hive
    $f3->set("conds", getCond());
    //instantiate a view
    $view = new Template();
    echo $view->render("views/orderForm2.html");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['conds'] = implode(", ",$_POST['conds']);
//        $_SESSION['cond[]'] = $_POST['cond[]'];
    //Add meals to f3 hive
        $f3->set("conds", DataLayer::getConds());
        $f3->reroute('summary');
    }

});

$f3->route('GET|POST /summary', function($f3) {
    //instantiate a view
    $view = new Template();
    echo $view->render("views/orderSummary.html");

    session_destroy();
});

//run fat free
$f3->run();


