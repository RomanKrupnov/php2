<?php


namespace App\controllers;

use App\main\App;

class OrderController extends Controller
{

    /*Функция выводит список товаров для администратора для последующего редактирования/удаления*/
    function EditOrderCatalogAction()
    {
        $objectUser = App::call()->userARepository->getUserAdressEdit();
        foreach ($objectUser as $user) {
            $objectOrder = App::call()->orderRepository->getOrders($user->id);

            echo $this->render('EditOrderCatalog', ['users' => $user, 'orders' => $objectOrder]);
        }
    }

    /**
     * Вывод заказов пользователя
     * @return false|string
     */
    public function outputOrderAction()
    {

        if ($_SESSION['role'] == null) {
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        if (empty($_SESSION['idUser'])) {
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        $idUser = $_SESSION['idUser'];
        $objectUser = App::call()->userARepository->getUserAdress($idUser);
        foreach ($objectUser as $user) {
            $objectOrder = App::call()->orderRepository->getOrders($user->id);
            echo $this->render('orders', ['users' => $user, 'orders' => $objectOrder]);
        }
    }

    /**
     * функция для оформления заказа пользователем (Ввод персональных данных)
     * @return mixed
     */
    public function makeAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { /*Добавляем в таблицу адресные данные получателя заказа*/
            App::call()->orderService->fillOrder($this->request->post());
        }
        return $this->render('make');
    }

    /**
     * Удаление заказа
     */
    public function DeleteOrderAction()
    {

        App::call()->orderRepository->delete($this->getId());
        App::call()->userARepository->delete($this->getId());
        header('Location:' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    /**
     *  Функция редактирования Заказа администратором
     */
    function EditOrderAction()
    {
        $user = App::call()->userARepository->getOne($this->getId());
        $orders = App::call()->orderRepository->getOrders($user->id);
        if (isset($_POST['editName']) & ($_SERVER['REQUEST_METHOD'] == 'POST')) {
            App::call()->orderService->fillEditName($this->request->post(), $user);
            return header('Location:' . $_SERVER['HTTP_REFERER']);
        }
        if (isset($_POST['editGoods']) & ($_SERVER['REQUEST_METHOD'] == 'POST')) {
            App::call()->orderService->fillEditOrders($this->request->post(), $user->id);
            return header('Location:' . $_SERVER['HTTP_REFERER']);
        }
        return $this->render('editOrder', ['user' => $user, 'orders' => $orders]);

    }

    /*Функция удаления товара из заказа администратором*/
    function delGoodAction()
    {
        App::call()->orderRepository->deleteGoodOrder($this->getId(), $this->getIdProduct());
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }
}