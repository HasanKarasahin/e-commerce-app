<?php
class DetailsView extends AbstractView {

    function getTemplate($data = 'Details')
    {
        return self::getTemplateFromFile($data.DIRECTORY_SEPARATOR.$data);
    }
}