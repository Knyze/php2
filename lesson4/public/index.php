<?php

require "../engine/Autoload.php";
require "../config/config.php";

use app\model\Products;
use app\model\Cart;
use app\model\Orders;
use app\model\Users;

use app\engine\Autoload;


spl_autoload_register([new Autoload(), 'loadClass']);


//$product = Products::getOne(7);
//var_dump($product->changed);
//$product->changed['description'] = true;
//$product->changed['price'] = true;
//$product->description = 'Описание';
//$product->price = 75;
//$product->update();

//$product = (new Products())->getOne(1);

//$product->getOne(1);

//var_dump($product);

//var_dump($product::getAll());

//$product->insert();

//$product->delete();

//var_dump($product);


$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

//var_dump($controllerClass);

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    echo "404";
}






