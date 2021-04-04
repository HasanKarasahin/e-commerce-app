<?php
class BasketView extends AbstractView {

    public function getTemplate($data='Basket')
    {
        //Gelişmiş bir template engin kullanmadıgım için şu ameleligi yaptım.
        $view="";
        if($data=="Basket_Table_Header"){
            $view = self::getTemplateFromFile('Basket'.DIRECTORY_SEPARATOR.'Basket_Table_Header');
        }else if($data=="Basket_Table_Content"){
            $view .= self::getTemplateFromFile('Basket'.DIRECTORY_SEPARATOR.'Basket_Table_Content');
        }else if($data=="Basket_Table_Footer"){
            $view .= self::getTemplateFromFile('Basket'.DIRECTORY_SEPARATOR.'Basket_Table_Footer');
        }else{
            $view = self::getTemplateFromFile('Basket'.DIRECTORY_SEPARATOR.'Basket_Table_Header');
            $view .= self::getTemplateFromFile('Basket'.DIRECTORY_SEPARATOR.'Basket_Table_Content');
            $view .= self::getTemplateFromFile('Basket'.DIRECTORY_SEPARATOR.'Basket_Table_Footer');
        }

        return $view;
    }
}