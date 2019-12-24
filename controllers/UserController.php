<?php


namespace App\controllers;

use App\main\App;
use App\repositories\LoginRepository;
use App\repositories\UserRepository;
use App\services\UserService;
use App\entities\User;
use App\entities\Entity;

class UserController extends Controller
{
    /**
     * Удаление пользователя
     */
    public function deleteAction()
    {
        App::call()->userRepository->delete($this->getId());
        header('Location:' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    /**
     * Вывод всех пользователей
     * @return false|string
     */
    public function allAction()
    {
        return $this->render('users',
            ['users' => App::call()->userRepository->getAll(),
            'title' => 'Все пользователи']);
    }

    /**
     * Вывод данных пользователя
     * @return false|string
     */

    public function oneAction()
    {
        $objectUser = App::call()->userRepository;
        $user = $objectUser->getOne($this->getId());
        return $this->render('user', ['user' => $user,
            'title' => $user->name]);
    }
    /**
     *  Функция выводит форму и проверяет вход пользователя
     * @return mixed
     */


    public function loginAction()
    {
        if ($_SESSION['login'] == true) {
            switch ($_SESSION['role']) {
                case 'admin':
                    return $this->render('files');
                    break;
                case 'user':
                    return $this->render('user');
                    break;
            }
        }
            $userObject = App::call()->loginRepository->getLogin($_POST['login']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            App::call()->userService->authUser($this->request->post(),$userObject);
            return header('Location:' . $_SERVER['HTTP_REFERER']);
        }
        return $this->render('login');
    }


    /**
     * Регистрация нового пользователя
     * @return false|string
     */
    public function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            App::call()->userService->fillUser($this->request->post());
            return header('Location: /good');
        }
       return $this->render('userAdd');
    }
    /**
     * редактирование пользователя
     */
    public function editAction()
    {
        if (empty($this->getId())) {
            return header('Location : /user');
        }
        $user = App::call()->userRepository->getOne($this->getId());
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            App::call()->userService->fillUser($this->request->post(),$user);
            return header('Location: /good');

        }
        return $this->render('userUpdate', ['user' => $user,
            'title' => 'Редактирование пользователя']);
    }

    /**
     * Выход из аккаунта
     */
    public function exitAction()
    {
        session_destroy();
        header('Location: /good');
        exit;
    }
}