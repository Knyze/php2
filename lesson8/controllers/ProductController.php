<?php

namespace app\controllers;


use app\engine\App;
//use app\model\Products;
//use app\engine\Request;

class ProductController extends Controller {
    
    public function actionCatalog(){
        $products = App::call()->productRepository->getAll();
        echo $this->render('catalog', [
            'products' => $products,
            'imgDir' => IMG_DIR
        ]);
    }

    public function actionCard(){
        $id = App::call()->request->getParams()['id'];
        $product = App::call()->productRepository->getOne($id);
        echo $this->render('card', [
            'product' => $product,
            'imgDir' => IMG_DIR
        ]);
    }

}