<?php


namespace App\services;


interface iOrders
{
    /**
     * функция для оформления заказа пользователем (Ввод персональных данных)
     * @return mixed
     */
    function makeAction();
    /**
     * Функция выводит все заказы пользователя
     * @return mixed
     */

    function outputOrderAction($id);
    /**
     * Функция выводит список товаров для администратора для последующего редактирования/удаления
     * @return mixed
     */
    function EditOrderCatalogAction();
    /**
     * Функция для удаления  заказа админимтратором
     * @return mixed
     */
    function DeleteOrderAction();
    /**
     * Функция для редактирования товаров администратором
     * @return mixed
     */
    function EditOrderAction();

    /**
     * Функция для удаления товара из заказа
     * @return mixed
     */
    function delGoodAction();

}