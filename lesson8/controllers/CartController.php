<?php

namespace app\controllers;


use app\engine\App;
use app\models\entities\Cart;
//use app\engine\Request;

class CartController extends Controller {
    
    public function actionIndex() {
        echo $this->render('cart', [
            'result' => App::call()->cartRepository->getCart(session_id()),
            'imgDir' => IMG_DIR
        ]);
    }
    
    public function actionAddCart() {
        
        $app = App::call();
        
        $product_id = $app->request->getParams()['id'];
        $id_cart = $app->cartRepository->getIdCart(session_id(), $product_id);
        
        
        if (is_null($id_cart)) {
            $cart = new Cart(null, session_id(), $product_id, 1);
        } else {
             $cart = $app->cartRepository->getOne($id_cart);
             $cart->quantity++;
        }
        $app->cartRepository->save($cart);
        
        $count = $app->cartRepository->getCountWhere('session', session_id());
        
        $response = [
            'result' => 1,
            'count' => $count,
            'product_id' => $product_id
        ];
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    public function actionAddProduct() {
        //Буфер нужен чтобы обработать json-ответ (по прямой ссылке)
        ob_start();
        $this->actionAddCart();
        $response = json_decode(ob_get_clean());
        //var_dump($response);
        header("Location: /product/card/?id={$response->product_id}");
    }
    
    public function actionDeleteCart() {
        
        $id_cart = App::call()->request->getParams()['id'];
                
        $cart = App::call()->cartRepository->getOne($id_cart);
        
        if ($cart->session !== session_id()) {
            die();
        }
        App::call()->cartRepository->delete($cart);
        
        $count = App::call()->cartRepository->getCountWhere('session', session_id());
        
        $response = [
            'result' => 1,
            'count' => $count
        ];
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
}