<?php

namespace app\model;

class Users extends DbModel {
    
    public $id;
    public $login;
    public $pass;
    public $admin;
    
    public $changed = [
        'login' => false,
        'pass' => false
    ];
    
    
    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        
    }

    public static function getTableName() {
        return 'users';
    }

}