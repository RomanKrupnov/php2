<?php


namespace App\repositories;
use App\entities\Login;
use App\controllers\UserController;


class LoginRepository extends Repository
{
    /**
     * метод возвращает имя таблицы базы данных
     * @return string
     */
    public function getTableName(): string
    {
        return 'users';
    }
    /**
     * метод возвращает имя сущьности
     * @return string
     */
    public function getEntityClass(): string
    {
        return Login::class;
    }
}