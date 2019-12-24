<?php


namespace App\controllers;
use App\modules\load;
use App\services\db;

class LoadController
{
    protected $defaultAction = 'load';
    public function run($action){
        if(empty($action)){
            $action = $this->defaultAction;
        }
        $method = $action . 'Action';
        if(method_exists($this,$method)){
            return $this->$method();
        }
        return 'УПС ошибка 404';
    }
    public function insertAction(){
        $objectFiles = (new Load())->save();
    }
    public function loadAction(){
        $load= new Load();
        return $this->render('load',['load'=>$load]);
    }
    public function renderTmpl($template, $params = []){
        ob_start();
        extract($params);
        include dirname(__DIR__) . '/views/' . $template . '.php';
        return ob_get_clean();
    }
    public function render($template, $params = []){
        $content = $this->renderTmpl($template,$params);
        return $this->renderTmpl(
            'layouts/main',
            ['content'=> $content]
        );

    }

}