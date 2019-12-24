<?php


namespace App\services;


interface iLoadTable
{
    /**
     * Функция выводит нужную таблицу с нужным id
     * @param $sql
     * @return mixed
     */
    function find($sql);

    /**
     * Функция выводит все записи таблицы по ее имени
     * @param $sql
     * @return mixed
     */
    function findAll($sql);

}