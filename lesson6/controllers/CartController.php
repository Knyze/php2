<?php

namespace app\controllers;


use app\model\Cart;
use app\engine\Request;

class CartController extends Controller {
    
    public function actionIndex() {
        echo $this->render('cart', [
            'result' => Cart::getCart(session_id()),
            'imgDir' => IMG_DIR
        ]);
    }
    
    public function actionAddCart() {
        
        $product_id = (new Request())->getParams()['id'];
        $id_cart = Cart::getIdCart(session_id(), $product_id);
        
        
        if (is_null($id_cart)) {
            $cart = new Cart(null, session_id(), $product_id, 1);
        } else {
             $cart = Cart::getOne($id_cart);
             $cart->quantity++;
        }
        $cart->save();
        
        $count = Cart::getCountWhere('session', session_id());
        
        $response = [
            'result' => 1,
            'count' => $count
        ];
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    public function actionDeleteCart() {
        
        $id_cart = (new Request())->getParams()['id'];
        
        //(Cart::getOne($id_cart))->delete();
        $cart = Cart::getOne($id_cart);
        $cart->delete();
        
        $count = Cart::getCountWhere('session', session_id());
        
        $response = [
            'result' => 1,
            'count' => $count
        ];
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    public function actionAddProduct() {
        ob_start();
        $this->actionAddCart();
        ob_get_clean();
        header('Location: /cart/');
    }
    
}