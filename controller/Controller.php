<?php

class Controller
{
    private $_f3; //fat free object

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        //instantiate a view
        $view = new Template();
        echo $view->render("views/dinerHome.html");
    }
}