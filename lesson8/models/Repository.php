<?php

namespace app\models;


//use app\interfaces\IModel;
use app\engine\App;
use app\engine\Db;
use app\models\entities\DataEntity;

abstract class Repository {
    
    protected $db;

    public function __construct()
    {
        $this->db = App::call()->db;
    }
    
    abstract public function getTableName();
    abstract public function getEntityClass();
    
    public function getWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:$field";
        return $this->db->queryAll($sql, ["$field"=>$value]);
    }
    
    public function getCountWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT sum(quantity) as count FROM {$tableName} WHERE `$field` = :$field";
        return $this->db->queryOne($sql, ["$field"=>$value])['count'];
    }
    
    public function getOneWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:$field";
        return $this->db->queryObject($sql, ["$field"=>$value], $this->getEntityClass());
    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryObject($sql, ['id' => $id], $this->getEntityClass());
    }
    
    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }
    
    public function getLimit(int $from,int $limit) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT {$from}, {$limit}";
        return $this->db->queryAll($sql);
    }
    
    public function insert(DataEntity $entity) {
        $tableName = $this->getTableName();
        $params = [];
        $colums = [];

        foreach($entity->changed as $key => $value) {
            $params[":{$key}"] = $entity->$key;
            $colums[] = "`$key`";
        }
        $colums = implode(", ", $colums);
        $values = implode(", ", array_keys($params));

        

        $sql = "INSERT INTO {$tableName} ({$colums}) VALUES ({$values})";
        
        $this->db->execute($sql, $params);

        $this->id = $this->db->lastInsertId();
    }

    public function update(DataEntity $entity) {
        $tableName = $this->getTableName();
        $params = [];
        $colums = '';
        
        foreach($entity->changed as $key => $value) {
            if ($value) {
                $params[":{$key}"] = $entity->$key;
                $colums .= "`{$key}` = :{$key},";
            }
        }
        $params[":id"] = $entity->id;
        $colums = substr($colums, 0, -1);

        $sql = "UPDATE {$tableName} SET {$colums} WHERE `id` = :id";
        
        $this->db->execute($sql, $params);
    }

    public function delete(DataEntity $entity) {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, ['id' => $entity->id]);
    }
    
    public function save(DataEntity $entity) {
        if (is_null($entity->id))
            $this->insert($entity);
        else
            $this->update($entity);
    }

}