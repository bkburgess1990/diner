<?php

    //return true if food has at least 2 characters
    function validFood($food)
    {
        //inefficient
//        if(strlen($food < 2))
//        {
//            return false;
//        }
//        else {
//            return true;
//        }

        //efficient
        return strlen($food) > 2;
    }

    function validMeal($meal)
    {
        return in_array($meal, DataLayer::getMeals());
    }
