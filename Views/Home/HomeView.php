<?php
class HomeView extends AbstractView {

    public function getTemplate($data='Home')
    {
        return self::getTemplateFromFile($data);
    }
}