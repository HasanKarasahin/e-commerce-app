<?php
namespace Modeller;
use Model\Model;
class Product extends Model {
    static function getProducts(){
        return self::getDataFromDb('products');
    }
}