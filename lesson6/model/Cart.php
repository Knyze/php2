<?php

namespace app\model;


use app\engine\Db;

class Cart extends DbModel {
    
    private $id;
    private $user_id;
    private $session;
    private $product_id;
    private $quantity;
    
    public $changed = [
        'user_id' => false,
        'session' => false,
        'product_id' => false,
        'quantity' => false
    ];
    
    
    public function __construct($user_id = null, $session = null, $product_id = null, $quantity = null) {
        
        $this->user_id = $user_id;
        $this->session = $session;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        
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
        return 'cart';
    }
    
    public static function getCart($session) {
        $sql = "SELECT b.id id, p.id product_id, p.name, p.img img, p.price, b.quantity FROM cart b,products p WHERE b.product_id=p.id AND session = :session";
        return Db::getInstance()->queryAll($sql, ['session' => $session]);
    }
    
    public static function getIdCart($session, $product_id) {
        //SELECT * FROM `cart` WHERE `session` = '' AND `product_id` = ''
        $sql = "SELECT id FROM `cart` WHERE `session` = :session AND `product_id` = :product_id";
        return Db::getInstance()->queryOne($sql,
            [
                'session' => $session,
                'product_id' => $product_id
            ]
        )['id'];
    }
    
}