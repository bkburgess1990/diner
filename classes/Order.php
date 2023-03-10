<?php

/**
 * Order class represents an order from my diner
 */
class Order
{
    private $_food;
    private $_meal;
    private $_condiments;

    function __construct($food = "", $meal = "", $condiments = "")
    {
        $this->_food = $food;
        $this->_meal = $meal;
        $this->_condiments = $condiments;
    }


    /**
     * getFood returns the food item ordered
     * @return string
     */

    public function getFood()
    {
        return $this->_food;
    }

    public function setFood($food)
    {
        $this->_food = $food;
    }

    public function getMeal()
    {
        return $this->_meal;
    }

    public function setMeal($meal)
    {
        $this->_meal = $meal;
    }

    public function getCondiments()
    {
        return $this->_condiments;
    }

    public function setCondiments($condiments)
    {
        $this->_condiments = $condiments;
    }

}