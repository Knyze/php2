<?php

namespace app\model;

class Users extends DbModel {
    
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
        return 'users';
    }
    
    public static function auth($login, $pass) {
        $user = static::getOneWhere('login', $login);
        
        if (password_verify($pass, $user->pass)) {
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    public static function isAuth() {
        return isset($_SESSION['login']) ? true: false;
    }
    
    public static function getName() {
        return static::isAuth() ? $_SESSION['login'] : "Guest";
    }

}