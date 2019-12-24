<?php


namespace App\repositories;
use App\entities\Basket;


class BasketRepository extends Repository
{
    /**
     * метод возвращает имя таблицы базы данных
     * @return string
     */
    public function getTableName(): string
    {
        return 'images';
    }

    /**
     * метод возвращает имя сущьности
     * @return string
     */
    public function getEntityClass(): string
    {
        return Basket::class;
    }


}