<?php

namespace app\models\entities;


class Users extends DataEntity {
    
    private $id;
    private $login;
    private $pass;
    private $admin;
    
    public $changed = [
        'login' => false,
        'pass' => false
    ];
    
    
    public function __construct($login = null, $pass = null) {
        $this->login = $login;
        $this->pass = $pass;
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
        if ($name == 'id' || $name == 'admin')
            return $this->id;
    }
    
    public function __isset($name) {
        if (array_key_exists($name, $this->changed)) {
            return true;
        }
        if ($name == 'id' || $name == 'admin')
            return true;
    }

}