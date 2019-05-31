<?php

require "../engine/Autoload.php";

use app\engine\Autoload;

use app\model\Product;
use app\model\DigitalProduct;
use app\model\ThingProduct;
use app\model\WeightProduct;


spl_autoload_register([new Autoload(), 'loadClass']);

$product1 = new WeightProduct(1, 'Товар1', 2.5, 100);
$product2 = new DigitalProduct(2, 'Товар2', 100);

$product1->buyProduct();

$product2->buyProduct();

echo product::$profit;
