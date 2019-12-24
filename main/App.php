<?php

namespace App\main;

use App\repositories\BasketRepository;
use App\repositories\FilesRepository;
use App\repositories\GoodRepository;
use App\repositories\LoginRepository;
use App\repositories\OrderRepository;
use App\repositories\UserARepository;
use App\repositories\UserRepository;
use App\services\BasketService;
use App\services\db;
use App\services\GoodService;
use App\services\OrderService;
use App\services\renders\IRender;
use App\services\UserAService;
use App\services\UserService;
use App\traits\TSingleton;

/**
 * Class App
 * @package App\main
 * @property IRender render
 * @property db db
 * @property UserRepository userRepository
 * @property GoodRepository goodRepository
 * @property BasketRepository basketRepository
 * @property FilesRepository filesRepository
 * @property LoginRepository loginRepository
 * @property OrderRepository orderRepository
 * @property UserARepository userARepository
 * @property UserService userService
 * @property BasketService basketService
 * @property GoodService goodService
 * @property OrderService orderService
 * @property UserAService userAService
 */
class App
{
    use TSingleton;

    public $config = [];
    private $components = [];
    public function run(array $config)
    {
        $this->config = $config;
        $this->runController();
    }
    static public function call(): App
    {
        return static::getInstance();
    }

    public function runController(){
        $request = new \App\services\Request();
        $controllerName = $request->getControllerName() ? : 'good';
        $actionName = $request->getActionName();
        new \Twig\Loader\FilesystemLoader();
        $controllerClass = 'App\\controllers\\' . ucfirst($controllerName) . 'Controller';
        if(class_exists($controllerClass)){
            $controller = new $controllerClass(
                new \App\services\renders\TwigRender(),
                $request);
            echo $controller->run($actionName);
        }

    }
    public function __get($name)
    {
        if (array_key_exists($name, $this->components)) {
            return $this->components[$name];
        }

        if (!array_key_exists($name, $this->config['components'])) {
            return null;
        }

        $className = $this->config['components'][$name]['class'];

        if (array_key_exists('config', $this->config['components'][$name])) {
            $config = $this->config['components'][$name]['config'];
            $components = new $className($config);
        } else {
            $components = new $className();
        }

        $this->components[$name] = $components;
        return  $components;
    }


}