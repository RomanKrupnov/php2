<?php


namespace App\repositories;
use App\entities\UserA;

class UserARepository extends Repository
{
    /**
     * метод возвращает имя таблицы базы данных
     * @return string
     */
    public function getTableName(): string
    {
        return 'useradress';
    }
    /**
     * метод возвращает имя сущьности
     * @return string
     */
    public function getEntityClass(): string
    {
        return UserA::class;
    }
    public function  delete($id){
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->exec($sql,[':id' => $id]);

    }

}