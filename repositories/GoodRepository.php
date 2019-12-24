<?php


namespace App\repositories;
use App\entities\Good;

class GoodRepository extends Repository
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
        return Good::class;
    }
}