<?php

namespace app\model;

class Products extends Model {
    
    public $id;
    public $name;
    public $description;
    public $img;
    public $price;
    
    public function __construct($name = null, $description = null, $img = null, $price = null)
    {
        parent::__construct();
        $this->name = $name;
        $this->description = $description;
        $this->img = $img;
        $this->price = $price;
        
    }

    public function getTableName() {
        return 'products';
    }

}