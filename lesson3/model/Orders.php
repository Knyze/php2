<?php

namespace app\model;

class Orders extends Model {
    
    public $id;
    public $user;
    public $description;
    public $sum;
    public $status;
    
    
    public function __construct($user = null, $description = null, $sum = null, $status = null)
    {
        parent::__construct();
        $this->user = $user;
        $this->description = $description;
        $this->sum = $sum;
        $this->status = $status;
        
    }
    
    public function getTableName() {
        return 'orders';
    }
    
}