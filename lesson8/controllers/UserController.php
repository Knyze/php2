<?php

namespace app\controllers;


use app\engine\App;
use app\models\Users;
//use app\engine\Request;

class UserController extends Controller {
    
    public function actionIndex() {
        echo $this->render('login');
    }
    
    public function actionLogin() {
        
        $params = App::call()->request->getParams();
        $login = $params['login'];
        $pass = $params['pass'];
        
        if (!App::call()->userRepository->auth($login, $pass)) {
            Die("Не верный пароль!");
        } else
            header("Location: /");
        exit();
    }
    
    public function actionLogout() {
        session_destroy();
        header("Location: /");
        exit();
    }
}