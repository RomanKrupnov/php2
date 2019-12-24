<?php
namespace App\repositories;
use App\entities\Entity;
use App\main\App;
use App\services\db;

abstract class Repository
{
    /**
     * @var db
     */
    protected $db;

    public function __construct()
    {
        $this->db = App::call()->db;
    }
    /**
     * Возвращает имя таблицы в базе данных
     * @return string
     */
    abstract public function getTableName(): string;

    /**
     * Возвращает имя сущности
     * @return string
     */
    abstract public function getEntityClass(): string;

    /**
     * получаем последний ID
     * @return mixed
     */
    public function getLastId(){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} ORDER BY id DESC LIMIT 1";
        return $this->db->queryObject($sql, $this->getEntityClass());
    }

    /**
     * получаем выборку из таблицы для проверки пользователя
     * @param $login
     * @return mixed
     */
    public function getLogin($login){
        $tableName = $this->getTableName();
        $sql = "SELECT id, name, role, login, pass FROM {$tableName} WHERE login = :login";
        return $this->db->queryObject($sql, $this->getEntityClass(), [':login' => $login]);

    }

    /**
     * Функция вывода множества записей из таблицы
     * @return mixed
     */
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryObjects($sql, $this->getEntityClass());
    }

    /**
     * Функция вывода единицы товара
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id= :id";
        return $this->db->queryObject($sql, $this->getEntityClass(), [':id' => $id]);
    }

    /**
     * Выводим список заказов для редактирования администратором
     * @return array
     */
    public function getUserAdressEdit(){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} ORDER BY useradress.id DESC"; //выводим данные пользователя заказа
        return $this->db->queryObjects($sql, $this->getEntityClass());
    }

    public function getOrderUser($id_user){
        $a=$this->getUserAdress($id_user);
        //getOrders($id_order)
        foreach($a as $adress ){
            var_dump($adress->id);
            $b=$this->getOrders($adress->id);
//            foreach ($b as $order){
//            }
        }

    }

    /**
     * Получаем список заказов
     * @param $id_user
     * @return mixed
     */
    public function getUserAdress($id_user){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id_user= :id_user";
        return $this->db->queryObjects($sql, $this->getEntityClass(), [':id_user' => $id_user]);
    }

    /**
     * Получаем товары пользователя
     * @param $id_order
     * @return mixed
     */
    public function getOrders($id_order){
        $sql = "SELECT * FROM orders WHERE id_order = :id_order";
        return $this->db->queryObjects($sql, $this->getEntityClass(), [':id_order' => $id_order]);

    }


    /**
     * Функция удаления записи из таблицы
     * @param $id
     */
        public function delete($id)
    {
            $tableName = $this->getTableName();
            $sql = "DELETE FROM $tableName WHERE id = :id";
            return $this->db->exec($sql,[':id' => $id]);

    }
    /**
     * Функция добавления записи в таблицу
     * @param Entity $entity
     */
    protected function insert(Entity $entity)
    {
        $columns = [];
        $params = [];
        foreach ($entity as $property => $value) {
            if (empty($value)) {
                continue;
            }
            $columns[] = $property;
            $params[":{$property}"] = $value;
        }
        $tableName = $this->getTableName();
        $columnsString = implode(', ', $columns);
        $placeholders = implode(', ', array_keys($params));
        $sql = "INSERT INTO {$tableName} ({$columnsString}) VALUES ({$placeholders})";
        $this->db->exec($sql, $params);
        $entity->id = $this->db->lastInsertId();
    }

    /**
     * функция внесения изменений в таблицу
     * * @param Entity $entity
     * @param $id
     */
    protected function update(Entity $entity)
    {
        $columns = [];
        foreach ($entity as $property => $value) {
            if ($property == 'id') {
                continue;
            }
            $columns[] = $property . '=' . "'" . $value . "'";
        }
        $tableName = $this->getTableName();
        $columnsString = implode(', ', $columns);
        $sql = "UPDATE {$tableName} SET $columnsString WHERE id= :id";;
        $this->db->exec($sql, [':id' => $entity->id]);

    }

    /**
     * @param Entity $entity
     */
    public function save(Entity $entity)
    {
        if (!$entity->id) {
            $this->insert($entity);
            return;
        }
        $this->update($entity);
    }


}