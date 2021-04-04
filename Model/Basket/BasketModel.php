<?php

class BasketModel extends Model
{
    static function getBaskets()
    {

        $baskets = self::getDataFromDb('baskets');
        $newBasketKeys = [];

        foreach ($baskets as $key => $item) {

            if (array_search($key, $newBasketKeys)) {
                unset($baskets->{$key});
            } else {
                array_push($newBasketKeys, $key);
            }

        }

        //unset($baskets->{'a6b3d3b76c133b3d2c3832ba0451f924'});
        //echo "<pre>";
        //print_r($baskets);
        return $baskets;
    }

    static function addBasket($newData)
    {
        $currentData = BasketModel::getBaskets();

        //TODO aynı ürün olanları birleştirip gönder. Sadece adet bilgisini arttır.

        $arr = array_merge((array)$currentData, $newData);
        setJsonFile('baskets.json', $arr);
    }
}