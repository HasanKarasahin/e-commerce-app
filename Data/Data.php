<?php

include_once("functions.php");

abstract class Data{
abstract function getData();

function getDataFromDb(){
    $result = getDataFromJsonFile('products.json');
    return $result;
}

}



