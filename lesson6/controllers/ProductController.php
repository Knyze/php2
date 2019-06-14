<?php

namespace app\controllers;


use app\model\Products;

class ProductController extends Controller {

    public function actionCatalog(){
        $products = Products::getAll();
        echo $this->render('catalog', [
            'products' => $products,
            'imgDir' => IMG_DIR
        ]);
    }

    public function actionCard(){
        $id = $_GET['id'];
        $product = Products::getOne($id);
        echo $this->render('card', [
            'product' => $product,
            'imgDir' => IMG_DIR
        ]);
    }

}