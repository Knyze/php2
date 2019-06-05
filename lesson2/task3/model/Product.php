<?php

namespace app\model;

abstract class Product {
    
    public $id;
    public $name;
    public $price;
    public static $profit = 0;
    
    abstract public function getPrice();
    
    function __construct($id, $name, $price) {
        
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        
    }
    
    public function buyProduct() {
        self::$profit += $this->getPrice();
    }
    
}