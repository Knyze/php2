<?php

class ItemProduct {
    
    protected $id;
    protected $name;
    protected $imgSrc;
    protected $price;
    
    function __construct($id, $name, $imgSrc, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->imgSrc = $imgSrc;
        $this->price = $price;
    }
    
    function info() {
        echo "Товар {$this->name} по цене {$this->price}<br>";
    }
    
}

class ItemCart extends ItemProduct {
    
    protected $quantity;
    
    function __construct($id, $name, $imgSrc, $price, $quantity) {
        $this->quantity = $quantity;
        parent::__construct($id, $name, $imgSrc, $price);
    }
    
    function info() {
        parent::info();
        echo "Количество {$this->quantity}<br>";
    }
}

$a = new ItemProduct(1, 'sdfsd', 'dsfdsf', 50);
$b = new ItemCart(1, 'dsfgsd', 'dsfdsf', 30, 4);

$a->info();
$b->info();