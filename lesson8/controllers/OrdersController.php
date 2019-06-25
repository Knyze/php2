<?php

namespace app\controllers;


use app\engine\App;
use app\models\entities\Orders;

class OrdersController extends Controller {
    
    public function actionIndex(){
        
        $app = App::call();
        
        if ($_SESSION['admin'] == 1) {
            $orders = $app->orderRepository->getAll();
        } else {
            $orders = $app->orderRepository->getWhere('session', session_id());
        };
        
        echo $this->render('orders', [
            'orders' => $orders,
        ]);
    }
    
    public function actionChangeOrder()
    {
        $app = App::call();
        
        $params = $app->request->getParams();
        $order = $app->orderRepository->getOne($params['order']);
        
        if ( $order->session !== session_id() && $_SESSION['admin'] !== 1 ) {
            die();
        }
        
        if (isset($params['status']) && $_SESSION['admin'] == 1) {
            $order->status = $params['status'];
        };
        if (isset($params['contacts'])) {
            $order->contacts = $params['contacts'];
        };
        
        $app->orderRepository->save($order);
        
    }

    public function actionAddOrder()
    {
        $app = App::call();
        
        $basket = $app->cartRepository->getCart(session_id());
        $data = '';
        $sum = 0;
        foreach ($basket as $item) {
            $data .= "{$item['name']}, количество: {$item['quantity']}, цена: {$item['price']}; ";
            $sum += +$item['quantity'] * +$item['price'];
        }
        $app->orderRepository->save(new Orders(session_id(), $data, $sum));
        header("Location: /orders/");
    }

}