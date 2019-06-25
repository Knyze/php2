<?php

namespace app\models\entities;


class Products extends DataEntity {
    
    private $id;
    private $name;
    private $description;
    private $img;
    private $price;
    
    public $changed = [
        'name' => false,
        'description' => false,
        'img' => false,
        'price' => false
    ];
    
    public function __construct($name = null, $description = null, $img = null, $price = null) {
        
        $this->name = $name;
        $this->description = $description;
        $this->img = $img;
        $this->price = $price;
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