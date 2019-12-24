<?php


namespace App\controllers;

use App\main\App;
use App\repositories\GoodRepository;
use App\services\GoodService;
use App\entities\Edit;

class GoodController extends Controller
{
    /**
     * Удаление товара
     */
    public function deleteAction(){

        App::call()->goodRepository->delete($this->getId());
        header('Location:' . $_SERVER['HTTP_REFERER']);
        exit;

    }
    /**
     *Редактор товара
     * @return false|string
     */
    public function editAction()
    {
        if (empty($this->getId())) {
            return header('Location : /good');
        }
        $good = App::call()->goodRepository->getOne($this->getId());
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            App::call()->goodService->editGood($this->request->post(),$good);
           return header('Location:' . $_SERVER['HTTP_REFERER']);
        }
        return $this->render('edit',['good'=>$good,
        'title' => 'Редактор товара']);
    }

    /**
     * Вывод всех товаров
     * @return false|string
     */
    public function allAction(){
        return $this->render('goods',['goods'=>App::call()->goodRepository->getAll(),
            'title' => 'Каталог']);
    }

    /**
     * Вывод товара
     * @return false|string
     */
    public function oneAction(){
        $objectGood = App::call()->goodRepository;
        $good = $objectGood->getOne($this->getId());
        return $this->render('good',['good'=>$good,
            'title' => $good->name]);
    }
    /**
     * Метод добавления нового товара в базу данных
     * @return false|string
     */
    public function loadAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            App::call()->goodService->fillGood($this->request->post());
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        return $this->render('load');
    }


}