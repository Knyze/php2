<?php

namespace app\engine;

use app\traits\Tsingletone;

class Db {
    
    use Tsingletone;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'shop',
        'charset' => 'utf8'
    ];

    private $connection = null;


    public function getConnection() {
        if (is_null($this->connection)) {
            
            $this->connection = new \PDO($this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
                
        }
        
        return $this->connection;
    }

    private function prepareDsnString() {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
            );
    }
// SELECT * FROM products WHERE id = :id, ['id' => 1]
    private function query($sql, $param) {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($param);
        return $stmt;
    }

    public function execute($sql, $params) {
        $this->query($sql, $params);
        return true;
    }

    public function queryOne($sql, $tableName, $param = []) {
        $STH = $this->query($sql, $param);
        $STH->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $tableName);
        return $STH->fetch();
        //return $this->query($sql, $param);
    }
    
    public function queryAll($sql, $param = []) {
        return $this->query($sql, $param)->fetchAll();
    }

}