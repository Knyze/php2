<?php

namespace app\model;

class WeightProduct extends Product {
    
    public $weight;
    
    function __construct($id, $name, $weight, $price) {
        
        parent::__construct($id, $name, $price);
        $this->weight = $weight;
        
    }
    
    public function getPrice() {
        return $this->price * $this->weight;
    }
    
}