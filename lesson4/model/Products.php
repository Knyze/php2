<?php

namespace app\model;

class Products extends DbModel {
    
    public $id;
    public $name;
    public $description;
    public $img;
    public $price;
    
    public $changed = [
        'name' => false,
        'description' => false,
        'img' => false,
        'price' => false
    ];
    
    public function __construct($name = null, $description = null, $img = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->img = $img;
        $this->price = $price;
        
    }
    
    public static function getTableName() {
        return 'products';
    }

}