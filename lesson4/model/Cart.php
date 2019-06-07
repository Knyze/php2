<?php

namespace app\model;

class Cart extends DbModel {
    
    public $id;
    public $user_id;
    public $product_id;
    public $quantity;
    
    public $changed = [
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
    
    public static function getTableName() {
        return 'cart';
    }
    
    
}