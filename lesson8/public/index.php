<?php
/*
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


try {
    
require_once '../vendor/autoload.php';
spl_autoload_register([new Autoload(), 'loadClass']);

$request = new Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
    
if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    throw new \Exception("Контроллер не существует", 404);
}
    
} catch (\PDOException $e) {
      var_dump($e);
}

catch (\Exception $e) {
    echo $e->getMessage();
    //var_dump($e->getTrace());
}
*/

session_start();

//include "../engine/Autoload.php";
require_once '../vendor/autoload.php';
$config = require __DIR__ . "/../config/config.php";


use app\engine\Autoload;
use app\engine\App;

//spl_autoload_register([new Autoload(), 'loadClass']);
try {
    App::call()->run($config);
} catch (Exception $e) {
    var_dump($e);
}





