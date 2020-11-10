<?php

namespace controllers;

class Base {
    public $baseTemplate = 'views/layout/base.php';

    public function renderContentTemplate($content, $title){
        ob_start();
        require_once(ROOTPATH.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'layouts'.DIRECTORY_SEPARATOR.'base.php');
        return ob_get_clean();

    }

    public function render ($dirName, $tplName, array $params = []){
        $contentTemplate = ROOTPATH.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$dirName.DIRECTORY_SEPARATOR.$tplName.'.php';
        extract($params);
        ob_start();
        require_once($contentTemplate);
        $content = ob_get_clean();
        ob_end_clean();
        return $this->renderContentTemplate($content,$title);
    }


    public function getUser(){
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        } else{
            return 'Гость';
        }
    }
}