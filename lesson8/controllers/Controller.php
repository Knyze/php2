<?php


namespace app\controllers;


use app\engine\App;
use app\interfaces\IRenderer;
//use app\models\Cart;
//use app\models\Users;

abstract class Controller implements IRenderer
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;
    private $renderer;
    
    
    public function __construct(IRenderer $renderer) {
        $this->renderer = $renderer;
    }

    public function actionIndex() {
        echo $this->render('index');
    }

    public function runAction($action = null) {
        
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method))
            $this->$method();
        else
            echo "404";
    }
    
    public function render($template, $params = []) {
        
        if ($this->useLayout) {
            return $this->renderTemplate(
                "layouts/{$this->layout}", [
                    'content' => $this->renderTemplate($template, $params),
                    'count' => App::call()->cartRepository->getCountWhere('session', session_id()),
                    'auth' => App::call()->userRepository->isAuth(),
                    'username' => App::call()->userRepository->getName()
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = []) {
        return $this->renderer->renderTemplate($template, $params);
    }
}