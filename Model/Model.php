<?php

namespace Model;
include_once("functions.php");
include_once "./db/Connection.php";
abstract class Model
{
    static function getDataFromDb($fileName = false)
    {
        $result = getDataFromJsonFile($fileName . '.json');
        return $result;
    }
}