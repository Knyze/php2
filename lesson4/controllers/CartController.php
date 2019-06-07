<?php

namespace app\controllers;


use app\model\Cart;

class CartController extends Controller {
    
    public function action1() {
        $result = Cart::getAll();
        echo $this->render('cart', [
            'result' => $result,
            'imgDir' => IMG_DIR
        ]);
    }
    
}