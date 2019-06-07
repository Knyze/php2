<?php

namespace app\model;

class Users extends Model {
    
    public $id;
    public $login;
    public $pass;
    public $admin;
    
    
    public function __construct($login = null, $pass = null)
    {
        parent::__construct();
        $this->login = $login;
        $this->pass = $pass;
        
    }

    public function getTableName() {
        return 'users';
    }

}