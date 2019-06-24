<?php

namespace app\model;

class Orders extends DbModel {
    
    private $id;
    private $user;
    private $description;
    private $sum;
    private $status;
    
    public $changed = [
        'user' => false,
        'description' => false,
        'sum' => false,
        'status' => false
    ];
    
    
    public function __construct($user = null, $description = null, $sum = null, $status = null) {
        
        $this->user = $user;
        $this->description = $description;
        $this->sum = $sum;
        $this->status = $status;
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
    
    public static function getTableName() {
        return 'orders';
    }
    
}