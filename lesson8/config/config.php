<?php

use app\engine\Request;
use app\models\repositories\CartRepository;
use app\models\repositories\ProductRepository;
use app\models\repositories\UserRepository;
use app\models\repositories\OrderRepository;
use app\engine\Db;


define('DS', DIRECTORY_SEPARATOR);
//define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('DIR_ROOT', __DIR__ . '/../');
define('PUBLIC_DIR', DIR_ROOT . 'public');
//define('CONTROLLER_NAMESPACE', 'app\\controllers\\');
//define('TEMPLATES_DIR', '../views/');
define('TWIG_TEMPLATES_DIR', '../twigtemplates/');
define('IMG_DIR', '/img/');

return [
    'root_dir' => __DIR__ . "/../",
    'templates_dir' => __DIR__ . "/../views/",
    'controllers_namespaces' => 'app\controllers\\',
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'shop',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        //По хорошему сделать для репозиториев отдельное простое хранилище
        //без reflection
        'cartRepository' => [
            'class' => CartRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'userRepository' => [
            'class' => UserRepository::class
        ],
        'orderRepository' => [
            'class' => OrderRepository::class
        ],

    ]
];
