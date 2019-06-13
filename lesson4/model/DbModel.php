<?php

namespace app\model;

//use app\interfaces\IModel;
use app\engine\Db;

abstract class DbModel extends Models {
    
    /*
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }
    */
    
    public function getWhere($name, $value) {

    }

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
    }
    
    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }
    
    public function insert() {
        $params = [];
        $colums = [];

        foreach($this->changed as $key => $value) {
            $params[":{$key}"] = $this->$key;
            $colums[] = "`$key`";
        }
        $colums = implode(", ", $colums);
        $values = implode(", ", array_keys($params));

        $tableName = static::getTableName();

        $sql = "INSERT INTO {$tableName} ({$colums}) VALUES ({$values})";

        Db::getInstance()->execute($sql, $params);

        $this->id = Db::getInstance()->lastInsertId();
    }

    public function update() {
        $params = [];
        $colums = '';

        $tableName = static::getTableName();
        
        foreach($this->changed as $key => $value) {
            if ($value) {
                $params[":{$key}"] = $this->$key;
                $colums .= "`{$key}` = :{$key},";
            }
        }
        $params[":id"] = $this->id;
        $colums = substr($colums, 0, -1);

        $sql = "UPDATE {$tableName} SET {$colums} WHERE `id` = :id";
        
        var_dump($sql);
        var_dump($params);

        Db::getInstance()->execute($sql, $params);
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }
    
    public function save() {
        if (is_null($this->id))
            $this->insert();
        else
            $this->update();
    }

}