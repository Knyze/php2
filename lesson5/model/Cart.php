<?php

namespace app\model;

class Cart extends DbModel {
    
    private $id;
    private $user_id;
    private $product_id;
    private $quantity;
    
    private $changed = [
        'user_id' => false,
        'product_id' => false,
        'quantity' => false
    ];
    
    
    public function __construct($user_id = null, $product_id = null, $quantity = null)
    {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        
    }
    
    public function __set($name, $value) {
        if (array_key_exists($name, $this->changed)) {
            $this->$name = $value;
            $this->changed[$name] = true;
        }
    }
    
    public function __get($name) {
        if (array_key_exists($name, $this->changed)) {
            return $this->$name;
        }
    }
    
    public function __isset($name) {
        if (array_key_exists($name, $this->changed)) {
            return true;
        }
    }
    
    public static function getTableName() {
        return 'cart';
    }
    
    
}