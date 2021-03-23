<?php

use Controller\Controller;

class Home extends Controller
{

    function display()
    {
        $data = \Modeller\Product::getProducts();
        //shuffle($data);
        $template = (new Templates\Home)->getTemplate();

        $view = "";

        foreach ($data as $key => $item) {
            $view .= str_replace(
                ['{productName}', '{price}', '{imageName}', '{key}'],
                [$item->productName, $item->price, $item->imageName, $key],
                $template);
        }
        return $view;
    }

    function action($actionType, $id)
    {
        if ($actionType == 'basketAdd') {

            //TODO Urun sepette var ise sayısını arttır

            //Urun yok ise yeni kayıt oluştur.
            $newKey = md5(uniqid());
            $newData = array(
                $newKey => array(
                    "id" => $newKey,
                    "productKey" => $id,
                    "userId" => 1,
                    "count" => 1
                )
            );

            \Modeller\Basket::addBasket($newData);
        }
    }
}