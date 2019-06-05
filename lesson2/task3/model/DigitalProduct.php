<?php

namespace app\model;

class DigitalProduct extends Product {
    
    public function getPrice() {
        return $this->price / 2;
    }
    
}
