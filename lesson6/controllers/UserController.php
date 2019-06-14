<?php

namespace app\controllers;


use app\model\Users;
use app\engine\Request;

class UserController extends Controller {
    
    public function actionIndex() {
        echo $this->render('login');
    }
    
    public function actionLogin() {
        
        $params = (new Request())->getParams();
        $login = $params['login'];
        $pass = $params['pass'];
        
        if (!Users::auth($login, $pass)) {
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