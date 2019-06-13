<?php

namespace app\model;

class Orders extends DbModel {
    
    public $id;
    public $user;
    public $description;
    public $sum;
    public $status;
    
    public $changed = [
        'user' => false,
        'description' => false,
        'sum' => false,
        'status' => false
    ];
    
    
    public function __construct($user = null, $description = null, $sum = null, $status = null)
    {
        $this->user = $user;
        $this->description = $description;
        $this->sum = $sum;
        $this->status = $status;
        
    }
    
    public static function getTableName() {
        return 'orders';
    }
    
}