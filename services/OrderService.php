<?php


namespace App\services;

use App\entities\UserA;
use App\entities\Order;
use App\main\App;
use App\repositories\UserARepository;
use App\repositories\OrderRepository;


class OrderService
{
    /**
     * @param $params
     * @param null $user
     */
    public function fillOrder($params, $user = null)
    {
        if (empty($user)) {
            $user = new UserA();
        }
        $user->nameUser = $params['name'];
        $user->lastName = $params['lastName'];
        $idUser = $_SESSION['idUser'];
        $user->id_user = $idUser;
        $user->telephone = $params['telephone'];
        $user->email = $params['email'];
        $user->adress = $params['adress'];
        if (!empty($user->nameUser && $user->lastName && $user->telephone && $user->email && $user->adress)) {
            App::call()->userARepository->save($user);
            foreach ($_SESSION['images'] as $idGood => $good) {
                $user = new Order();/*Добавляем товары в таблицу заказа*/
                $ID=App::call()->userARepository->getLastId();
                $user->id_users=$idUser;
                $user->id_product = $good['id_product'];
                $user->name = $good['name'];
                $user->url_img = $good['url_img'];
                $user->prise = $good['prise'];
                $user->currency = '$';
                $user->count = $good['count'];
                $user->id_order = $ID->id;
                App::call()->orderRepository->save($user);
            }
            unset($_SESSION['images']);
            header('Location: /good');
            exit;
        } else {
            $_SESSION['msg'] = 'Введите корректные данные';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
    /**
     * Обновляем данные в заказе адрес получателя
     * @param $params
     * @param $user
     */
    public function fillEditName($params, $user= null){
        if (empty($user)){
            $user = new UserA();
        }
        $user->nameUser = $params['name'];
        $user->lastName = $params['lastName'];
        $user->telephone = $params['telephone'];
        $user->email = $params['email'];
        $user->adress = $params['adress'];
        $user->status = $params['status'];
        if (!empty($user->nameUser && $user->lastName && $user->telephone && $user->email && $user->adress && $user->status)) {
            App::call()->userARepository->save($user);
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }
    public function fillEditOrders($params, $order= null){
        if (empty($order)){
            $order = new Order();
        }
        $order->id_product = $params['idProduct'];
        $order->prise = $params['prise'];
        $order->count = $params['count'];
         $order->id_order = $params['userId'];

        if (!empty($order->prise && $order->count)) {
            App::call()->orderRepository->updateOrder($order->id_product,$order->prise,$order->count,$order->id_order);
        }


    }


}