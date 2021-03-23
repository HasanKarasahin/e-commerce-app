<?php
namespace Templates;
use Views\View;
class Home extends View {

    public function getTemplate($data='Home')
    {
        return self::getTemplateFromFile($data);
    }
}