<?php

namespace app\model;

class Cart extends Model {
    
    public $id;
    public $user_id;
    public $product_id;
    public $quantity;
    
    public function __construct($user_id = null, $product_id = null, $quantity = null)
    {
        parent::__construct();
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        
    }
    
    public function getTableName() {
        return 'cart';
    }
    
    
}