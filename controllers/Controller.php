<?php


namespace App\controllers;


use App\services\renders\IRender;
use App\services\renders\TmplRender;
use App\services\Request;

abstract class Controller
{

    protected $render;
    protected $request;
    public function __construct(IRender $render, Request $request)
    {
        $this->render = $render;
         $this->request = $request;
    }
    protected $defaultAction = 'all';

    public function run($action){
        if(empty($action)){
            $action = $this->defaultAction;
        }
        $method = $action . 'Action';
        if(method_exists($this,$method)){
            return $this->$method();
        }
        return header('Location: index.php');
    }
    protected function render($template, $params = [])
    {
        return $this->render->render($template, $params);
    }
    protected function getId()
    {
        return (int) $this->request->get('id');
    }
    protected function getIdProduct()
    {
        return $this->request->get('id_product');
    }


}