<?php

require "../engine/Autoload.php";

use app\model\Products;
use app\model\Cart;
use app\model\Orders;

use app\engine\Autoload;
use app\engine\Db;

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Products(new Db());

$cart = new Cart(new Db());

$order = new Orders(new Db());

var_dump($order);


