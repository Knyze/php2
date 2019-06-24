<?php

namespace app\engine;

use app\interfaces\IRenderer;

//require_once '../vendor/autoload.php';

class TwigRender implements IRenderer {
    
    private $twig;
    
    
    public function __construct() {
        //подключить твиг
        $loader = new \Twig\Loader\FilesystemLoader(TWIG_TEMPLATES_DIR);
        $this->twig = new \Twig\Environment($loader);
    }
    
    public function renderTemplate($template, $params = []) {
        
        $fileName = $template . ".twig";
        if (file_exists(TWIG_TEMPLATES_DIR . $fileName)) {
            return $this->twig->render($fileName , $params);
        }
        else
            return "404";
    }
}