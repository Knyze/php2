<?php

namespace app\model;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel {
    
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }
    
    public function getWhere($name, $value) {

    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql, 'app\\model\\'.$tableName);
    }
    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }
    
    public function insert() {
        
        $sqlText1 = '';
        $sqlText2 = '';
        $params = [];
        
        foreach ($this as $key => $item) {
            $sqlText1 .= $key . ', ';
            $sqlText2 .= ':' . $key . ', ';
            $params[$key] = $item;
            //echo '<br>';
            //var_dump($key);
            //echo ' => ';
            //var_dump($item);
        }
        
        $sqlText1 = substr($sqlText1, 0, -6);
        $sqlText2 = substr($sqlText2, 0, -7);
        array_splice($params, -1, 1);
        
        /*
        echo '<br>';
        var_dump($sqlText1);
        echo '<br>';
        var_dump($sqlText2);
        */
        echo '<br>';
        var_dump($params);
        
        
        //echo '<br>';
        //var_dump( (array) $this);
        

        //$sql = "INSERT INTO `products`(`name`, `description`, `price`) VALUES (:name, :description, :price)";
        
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', $this->getTableName(), $sqlText1, $sqlText2);
        
        echo '<br>';
        var_dump($sql);
        
        $this->db->queryAll($sql, $params);

        //execute
        //$this->id = "lastID";

    }

    public function update() {

    }

    public function delete() {

    }


}