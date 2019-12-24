<?php


namespace App\controllers;

use App\entities\Basket;
use App\main\App;
use App\repositories\BasketRepository;
use App\services\BasketService;
use App\repositories\Repository;


class BasketController extends Controller
{
    public function oneAction()
    {
        $objectUser = App::call()->basketRepository;
        $basket = $objectUser->getOne($this->getId());
        return $this->render('user', ['user' => $basket, 'title' => 'Корзина']);
    }

    /**
     * функция для вывода корзины
     * @return mixed
     */
    public function outputAction()
    {
        if (empty($_SESSION['images'])) {
            return $this->render('basketZero');
        } else {
            if (empty($_SESSION['role'])) {
                $_SESSION['makeOrder'] = '/user/login';
            }
            return $this->render('basket', ['goods' => $_SESSION['images'],'link' => $_SESSION['makeOrder']]);
        }
    }

    /**
     * Добавляем товар в корзину
     *
     */
    public function addAction()
    {
        {
            $hasAdd = $this->hasAddGoodsInBasket();
            if (!$hasAdd) {
                header('location: /good');
                exit;
            }
            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

    }

    public function delAction()
    {
        if (empty($_GET['id'])) {
            header('location: /basket/output');
            exit;
        }
        $id = (int)$_GET['id'];
        if (!empty($_SESSION['images'][$id])) {
            $_SESSION['images'][$id]['count'] -= 1;
            if ($_SESSION['images'][$id]['count'] < 1) {
                unset($_SESSION['images'][$id]);
            }
        }
        $_SESSION['msg'] = 'Товар из корзины удален';
        header('Location:' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    public function ajaxAddAction()
    {
        $this->hasAddGoodsInBasket();
        return count($_SESSION['images']);
    }
    public function hasAddGoodsInBasket()
    {
        if (!empty($_GET['id'])) {
            $id = (int)$_GET['id'];
        } else {
            return false;
        }
        $basket = App::call()->basketRepository;
        if (!$basket = $basket->getOne($id)) {
            return false;
        }
        if (empty($_SESSION['images'][$id])) {
            $_SESSION['images'][$id] = [
                'id' => $basket->id,
                'name' => $basket->name,
                'url_img' => $basket->url_img,
                'prise' => $basket->prise,
                'id_product' => $basket->id_product,
                'count' => 1];
        } else $_SESSION['images'][$id]['count'] += 1;
        return true;
    }



}