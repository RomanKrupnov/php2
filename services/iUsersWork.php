<?php


namespace App\services;


interface iUsersWork
{
    /**
     * Функция для логирования пользователей
     * @return mixed
     */
    function loginAction();

    /**
     * Функция для регистрации пользователей
     * @return mixed
     */
    function regAction();

    /**
     * Функция выхода из аккаунта
     * @return mixed
     */
    function exitAction();


}