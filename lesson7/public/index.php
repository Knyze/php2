<?php
session_start();
require "../engine/Autoload.php";
require "../config/config.php";

use app\model\Products;
use app\model\Cart;
use app\model\Orders;
use app\model\Users;

use app\engine\Autoload;
use app\engine\Render;
use app\engine\TwigRender;
use app\engine\Request;


require_once '../vendor/autoload.php';
//spl_autoload_register([new Autoload(), 'loadClass']);


//$product = Products::getOne(7);
//$product->price = 7000;
//var_dump($product);
//echo '<br>' . $product->price;


//$cart = Cart::getOne(4);
//$cart = new Cart(null, session_id(), 2, 1);
//$cart->insert();
//var_dump($cart);
/*
if (is_null($cart->id))
    echo '0000000000000';
else
    echo '111111111111';
*/
//$cart->quantity = 100;
//$cart->update();
//var_dump($cart);



$request = new Request();

//$controllerName = $_GET['c'] ?: 'product';
//$actionName = $_GET['a'];
$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    echo "404";
}





