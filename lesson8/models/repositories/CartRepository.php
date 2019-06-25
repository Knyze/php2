<?php

namespace app\models\repositories;


use app\models\Repository;
use app\models\entities\Cart;

class CartRepository extends Repository
{
    
    public function getCart($session) {
        $sql = "SELECT b.id id, p.id product_id, p.name, p.img img, p.price, b.quantity FROM cart b,products p WHERE b.product_id=p.id AND session = :session";
        return $this->db->queryAll($sql, ['session' => $session]);
    }
    
    public function getIdCart($session, $product_id) {
        $sql = "SELECT id FROM `cart` WHERE `session` = :session AND `product_id` = :product_id";
        return $this->db->queryOne($sql,
            [
                'session' => $session,
                'product_id' => $product_id
            ]
        )['id'];
    }

    public function getTableName()
    {
        return 'cart';
    }

    public function getEntityClass()
    {
        return Cart::class;
    }
}