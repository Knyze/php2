<?php

require "../engine/Autoload.php";
require "../config/config.php";

use app\model\Products;
use app\model\Cart;
use app\model\Orders;
use app\model\Users;

use app\engine\Autoload;
use app\engine\Render;
use app\engine\TwigRender;


spl_autoload_register([new Autoload(), 'loadClass']);

/*
$product = Products::getOne(7);
$product->price = 7000;
var_dump($product);
echo '<br>' . $product->price;
*/

//var_dump($product->changed);
//$product->changed['description'] = true;
//$product->changed['price'] = true;
//$product->description = 'Описание';

//$product->update();

//$product = (new Products())->getOne(1);

//$product->getOne(1);



//var_dump($product::getAll());

//$product->insert();

//$product->delete();

//var_dump($product);


$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

//var_dump($controllerClass);

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRender());
    $controller->runAction($actionName);
} else {
    echo "404";
}




