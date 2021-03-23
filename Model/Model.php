<?php

namespace Model;
include_once("functions.php");
abstract class Model
{
    static function getDataFromDb($fileName = false)
    {
        $result = getDataFromJsonFile($fileName . '.json');
        return $result;
    }
}