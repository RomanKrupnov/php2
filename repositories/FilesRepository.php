<?php


namespace App\repositories;


use App\entities\Files;

class FilesRepository extends Repository
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
        return Files::class;
    }
}