<?php

abstract class AbstractView
{
    static function getTemplateStatic($data)
    {
        return $data;
    }

    abstract function getTemplate($data = null);

    static function getTemplateFromFile($fileName, $fileExt = '.html')
    {
        $fileContent = file_get_contents('assets' . DIRECTORY_SEPARATOR . 'static' . DIRECTORY_SEPARATOR . $fileName . $fileExt);
        return self::getTemplateStatic($fileContent);
    }
}