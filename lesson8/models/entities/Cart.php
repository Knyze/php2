<?php

namespace app\models\entities;


class Cart extends DataEntity {
    
    private $id;
    private $user_id;
    private $session;
    private $product_id;
    private $quantity;
    
    public $changed = [
        'user_id' => false,
        'session' => false,
        'product_id' => false,
        'quantity' => false
    ];
    
    
    public function __construct($user_id = null, $session = null, $product_id = null, $quantity = null) {
        
        $this->user_id = $user_id;
        $this->session = $session;
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
        if ($name == 'id')
            return $this->id;
    }
    
    public function __isset($name) {
        if (array_key_exists($name, $this->changed)) {
            return true;
        }
        if ($name == 'id')
            return true;
    }
    
    
    
}