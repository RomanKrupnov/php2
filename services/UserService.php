<?php


namespace App\services;
use App\entities\Login;
use App\entities\User;
use App\main\App;
use App\repositories\UserRepository;
use App\repositories\LoginRepository;

class UserService
{
    /**
     * Добавление, изменение данных пользователя
     * @param $params
     * @param null $user
     */
    public function fillUser($params, $user = null){
        if (empty($user)){
            $user = new User();
        }
        $user->name = $params['userName'];
        $user->login = $params['login'];
        $user->pass = password_hash($params['pass'], PASSWORD_DEFAULT);
                if (isset($params['upload'])) {
            if (!empty($params['login']) && !empty($params['userName'])) {
               $this->userSave($user);
            }
        }
    }
    private function userSave($user){
        App::call()->userRepository->save($user);
    }

    /**
     * Вход пользователя в аккаунт
     * @param $params
     * @param null $user
     */
    public function authUser($params,$user = null){
        if (empty($user)){
            $user = new Login();
        }
        if (password_verify($params['pass'], $user->pass)) {
            $_SESSION['login'] = true;
            $_SESSION['idUser'] = $user->id;
            $_SESSION['loginUser'] = $user->login;
            $_SESSION['nameUser'] = $user->name;
            $_SESSION['passwordUser'] = $user->pass;
            $_SESSION['makeOrder'] = '/order/make';
            if ($user->role == 1) {
                $_SESSION['role'] = 'admin';
            } else $_SESSION['role'] = 'user';
        }


    }

}