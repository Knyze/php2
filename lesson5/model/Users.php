<?php

namespace app\model;

class Users extends DbModel {
    
    private $id;
    private $login;
    private $pass;
    private $admin;
    
    private $changed = [
        'login' => false,
        'pass' => false
    ];
    
    
    public function __construct($login = null, $pass = null)
    {
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
    }
    
    public function __isset($name) {
        if (array_key_exists($name, $this->changed)) {
            return true;
        }
    }

    public static function getTableName() {
        return 'users';
    }

}