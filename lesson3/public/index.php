<?php

require "../engine/Autoload.php";
require "../config/config.php";

use app\model\Products;
use app\model\Cart;
use app\model\Orders;
use app\model\Users;

use app\engine\Autoload;


spl_autoload_register([new Autoload(), 'loadClass']);

$product = (new Products())->getOne(1);

//$product->getOne(1);

var_dump($product);

var_dump($product->getAll());

$product->insert();

//var_dump($product);


