<?php

namespace app\model;

class Orders extends Model {
    
    public $id;
    public $user;
    public $description;
    public $sum;
    public $status;
    
    public function getTableName() {
        return 'orders';
    }
    
}