<?php


namespace App\repositories;


use App\entities\Order;

class OrderRepository extends Repository
{
    /**
     * метод возвращает имя таблицы базы данных
     * @return string
     */
    public function getTableName(): string
    {
        return 'orders';
    }
    /**
     * метод возвращает имя сущьности
     * @return string
     */
    public function getEntityClass(): string
    {
        return Order::class;
    }
    public function  delete($id){
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id_order = :id_order";
        return $this->db->exec($sql,[':id_order' => $id]);

    }
    public function updateOrder($idProduct,$prise,$count,$id){
        $tableName = $this->getTableName();
        $sql ="UPDATE {$tableName} SET prise = :prise, count = :count
        WHERE id_product = :idProduct AND id_order= :id";
        return $this->db->exec($sql,[':idProduct'=>$idProduct,':prise'=>$prise,':count'=>$count,':id'=>$id]);
    }
    public function deleteGoodOrder($id,$idProduct){
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id_order= :id AND id_product=:idProduct";
        return $this->db->exec($sql,[':id'=>$id,':idProduct'=>$idProduct]);
    }

}