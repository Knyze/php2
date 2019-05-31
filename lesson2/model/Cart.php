<?php

namespace app\model;

class Cart extends Model {
    
    public $id;
    public $user_id;
    public $product_id;
    public $quantity;
    
    public function getTableName() {
        return 'cart';
    }
    
    
}