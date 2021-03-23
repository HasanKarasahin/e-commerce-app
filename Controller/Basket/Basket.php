<?php

use Controller\Controller;

class Basket extends Controller
{

    function display()
    {
        $dataBaskets = \Modeller\Basket::getBaskets();

        //TODO: Sepet boş ise ekran'a 'Sepetizde ürün bulunmaktadır. uyarısı verilecek.'

        $view = "";

        $template = (new Templates\Basket)->getTemplate('Basket_Table_Content');
        $i = 1;
        foreach ($dataBaskets as $key => $item) {
            $totalCount = 2;
            $dataProduct = \Modeller\Product::getProducts()->{$item->productKey};
            $view .= str_replace(
                ['{rowCount}', '{productName}', '{totalCount}', '{price}', '{totalPrice}', '{productCode}'],
                [$i, $dataProduct->productName,  $dataProduct->price, $totalCount, $totalCount * intval($dataProduct->price), $dataProduct->productCode],
                $template);
            $i++;
        }
        $templateHeader = (new Templates\Basket)->getTemplate('Basket_Table_Header');
        $templateFooter = (new Templates\Basket)->getTemplate('Basket_Table_Footer');

        return $templateHeader . $view . $templateFooter;
    }

    function action($actionType, $id)
    {
        // TODO: Implement action() method.
    }
}