<?php

include __DIR__.'/../Controller.php';
include __DIR__.'/../../Views/Home/HomeView.php';
include __DIR__.'/../../Model/Product/ProductModel.php';
include __DIR__.'/../../Model/Basket/BasketModel.php';

class HomeController extends Controller
{

    function display()
    {
        $data = ProductModel::getProducts();
        $template = (new HomeView)->getTemplate();

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

            BasketModel::addBasket($newData);
        }
    }
}