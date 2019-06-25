<?php

namespace app\models\entities;


class Orders extends DataEntity {
    
    private $id;
    private $session;
    private $contacts;
    private $description;
    private $sum;
    private $status;
    
    public $changed = [
        'session' => false,
        'contacts' => false,
        'description' => false,
        'sum' => false,
        'status' => false
    ];
    
    
    public function __construct($session = null, $description = null, $sum = null, $contacts = '', $status = 'checkOut') {
        
        $this->session = $session;
        $this->contacts = $contacts;
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
    
}