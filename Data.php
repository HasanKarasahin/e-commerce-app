<?php

$dataMap = array(
    "Home" => "Home",
);

spl_autoload_register(function ($class_name) {

    if (is_file('Data' . DIRECTORY_SEPARATOR . $class_name . DIRECTORY_SEPARATOR . $class_name . '.php')) {
        include_once('Data' . DIRECTORY_SEPARATOR . $class_name . DIRECTORY_SEPARATOR . $class_name . '.php');
    } else {
        include_once('Data' . DIRECTORY_SEPARATOR . $class_name . '.php');
    }

});

$d = $_GET['d'];

$result = array_key_exists($d, $dataMap);

if ($result) {
    $dataMapKey = $dataMap[$d];
    if (is_file('Data' . DIRECTORY_SEPARATOR . $dataMapKey . DIRECTORY_SEPARATOR . $dataMapKey . '.php')) {
        $obj = new $dataMap[$dataMapKey];
        print_r($obj->getData());
    } else {
        echo "Yok";
        //View::displayFromFile('_notfoundpage.html');
    }
} else {
    echo "Yok";
}