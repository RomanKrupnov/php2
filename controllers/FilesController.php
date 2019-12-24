<?php


namespace App\controllers;

use App\main\App;
use App\repositories\FilesRepository;

class FilesController extends Controller
{
    /**
     * Метод вывода товаров для редактирования
     * @return mixed
     */
    public function allAction(){
        return $this->render('files',
            ['files'=>App::call()->filesRepository->getAll(),
            'title'=>'Редактор товаров']);
    }
}