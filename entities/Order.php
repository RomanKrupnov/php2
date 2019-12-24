<?php


namespace App\entities;


class Order extends Entity
{
    public $id;
    public $id_users;
    public $id_product;
    public $name;
    public $url_img;
    public $prise;
    public $currency;
    public $count;
    public $id_order;

}