<?php

include_once("Controller/functions.php");


//JSON DOSYASINA DÜZGÜ BİR ŞEKİLDE YÜKLEME
/*
echo "<pre>";
$currentData = getDataFromJsonFile('products2.json');

$newProduct = array("key3"=>array(
    'ad'=>'Kaktus3',
    'fiyat'=>'Kaktus3',
    'baslik'=>'Kaktus3',
));

setJsonFile('products2.json',array_merge($currentData,$newProduct));
*/

//$currentData = getDataFromJsonFile('products2.json')['key2'];


echo "<pre>";


$dataBaskkets = getDataFromJsonFile('baskets.json');

$result = array_key_exists('4e97fade92f84dee1927217d095742d6', (array)$dataBaskkets);

print_r($result);
exit();

if (array_key_exists('4e97fade92f84dee1927217d095742d7', (array)$dataBaskkets)) {
    echo "Var";
} else {
    echo "Yok";
}