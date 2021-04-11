<?php

include __DIR__.'/../Controller.php';
include __DIR__.'/../../Views/Details/DetailsView.php';
include __DIR__.'/../../Model/Product/ProductModel.php';
class DetailsController extends Controller
{

    function display()
    {

        $nameUrl='';
        if(isset($_GET['urun'])){
            $nameUrl =  $_GET['urun'];

            $data = ProductModel::getProduct($nameUrl);

            $template = (new DetailsView())->getTemplate();


            $view = "";
            foreach ($data as $key => $item) {
                $view .= str_replace(
                    ['{productName}', '{price}','{discounted}','{categoryName}', '{imagePath}', '{key}','{url}','{description}'],
                    [$item['productName'], $item['price'],$item['discounted'],$item['categoryName'], $item['imagePath'], $key,$item['nameUrl'],$item['description']],
                    $template);
            }
            return $view;
        }else{
            return "ürün bulunamadı";
        }
    }

    function action($actionType, $id)
    {
        // TODO: Implement action() method.
    }
}

?>