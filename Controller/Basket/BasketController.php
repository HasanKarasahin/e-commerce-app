<?php

include __DIR__.'/../Controller.php';
include __DIR__."/../../Model/Basket/BasketModel.php";
include __DIR__."/../../Model/Product/ProductModel.php";
include __DIR__."/../../Views/Basket/BasketView.php";

class BasketController extends Controller
{

    function display()
    {
        $dataBaskets = BasketModel::getBaskets();

        //TODO: Sepet boş ise ekran'a 'Sepetizde ürün bulunmaktadır. uyarısı verilecek.'

        $view = "";

        $template = (new BasketView)->getTemplate('Basket_Table_Content');
        $i = 1;
        foreach ($dataBaskets as $key => $item) {
            $totalCount = 2;
            $dataProduct = ProductModel::getProducts()->{$item->productKey};
            $view .= str_replace(
                ['{rowCount}', '{productName}', '{totalCount}', '{price}', '{totalPrice}', '{productCode}'],
                [$i, $dataProduct->productName,  $dataProduct->price, $totalCount, $totalCount * intval($dataProduct->price), $dataProduct->productCode],
                $template);
            $i++;
        }
        $templateHeader = (new BasketView)->getTemplate('Basket_Table_Header');
        $templateFooter = (new BasketView)->getTemplate('Basket_Table_Footer');

        return $templateHeader . $view . $templateFooter;
    }

    function action($actionType, $id)
    {
        // TODO: Implement action() method.
    }
}