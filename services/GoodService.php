<?php


namespace App\services;
use App\entities\Edit;
use App\entities\Good;
use App\main\App;
use App\repositories\GoodRepository;
class GoodService
{
    /**
     * Добавление товара
     * @param $params
     * @param null $good
     */
    public function fillGood($params, $good = null){
        if (empty($good)){
            $good = new Good();
        }
        $good->name = $params['nameProduct'];
        $good->prise = $params['priseProduct'];
        $good->id_product = $params['idProduct'];
        $good->currency = $params['currency'];
        $good->desc_product = $params['descProduct'];
        $uploaddir = '/gallery/';
        $good->url_img = basename($_FILES['userfile']['name']);
        $uploadfile= dirname(__DIR__) . '/public/gallery/' . $_FILES['userfile']['name'];
        if (!file_exists($uploaddir)) {
                mkdir($uploaddir, 0755);
            }
        copy($_FILES['userfile']['tmp_name'], $uploadfile);
        App::call()->goodRepository->save($good);
    }

    /**
     * Редактирование товара
     * @param $params
     * @param null $good
     */
    public function editGood($params, $good = null){
        if (empty($good)){
            $good = new Edit();
        }
        $good->name = $params['name'];
        $good->url_img = $params['url_img'];
        $good->prise = $params['prise'];
        $good->id_product = $params['id_product'];
        $good->currency = $params['currency'];
        $good->desc_product = $params['desc_product'];

        if (!empty($good->name && $good->url_img && $good->prise && $good->id_product)) {
            App::call()->goodRepository->save($good);
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
        else {
            header('Location:' . $_SERVER['HTTP_REFERER']);
                exit;
            }
    }
    protected function hasErrors($params)
    {
        if (empty($params['login']) || empty($params['password'])) {
            return true;
        }

        return false;
    }
}