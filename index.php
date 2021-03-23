<?php

//$requestUri = $_SERVER['REQUEST_URI'];
$requestUri = strtok($_SERVER["REQUEST_URI"], '?');

$routeMap = array(
    "/" => "Home",
    "/index" => "Home",
    "/home" => "Home",
    "/anasayfa" => "Home",
    "/sepetim" => "basket",
    "/mybasket" => "basket",
);


spl_autoload_register(function ($class_name) {

    try {

        $parts = explode('\\', $class_name);

        $namespace = $parts[0];
        $classsName = $parts[1] ?? null;
        $filePath = "";

        if ($namespace == 'Templates') {
            $namespace = 'Views';
        }

        if ($namespace == 'Modeller') {
            $namespace = 'Model';
            //$filePath = $namespace . DIRECTORY_SEPARATOR . $classsName . '.php';
            //$filePath="Moddel/Product/Product.php";
            //include_once('Model/Product/Product.php');
            //echo $class_name."<br/>";
        }

        if ($classsName != null) {
            if ($classsName == 'View' || $classsName == 'Controller' || $classsName == 'Model') {
                $filePath = $namespace . DIRECTORY_SEPARATOR . $classsName . '.php';
            } else {
                $filePath = $namespace . DIRECTORY_SEPARATOR . $classsName . DIRECTORY_SEPARATOR . $classsName . '.php';
            }
        } else {
            $classsName = $namespace;
            $filePath = 'Controller' . DIRECTORY_SEPARATOR . $classsName . DIRECTORY_SEPARATOR . $classsName . '.php';
        }

        if (is_file($filePath)) {
            include_once $filePath;
        } else {

            echo "Hata var.";

        }

    } catch (Exception $e) {
        echo "Hata var.";
        exit();
    }

});

echo \Views\View::getTemplateFromFile('_header');

$result = array_key_exists($requestUri, $routeMap);

if ($result) {
    $routeMapKey = $routeMap[$requestUri];
    if (is_file('Controller' . DIRECTORY_SEPARATOR . $routeMapKey . DIRECTORY_SEPARATOR . $routeMapKey . '.php')) {
        $obj = new $routeMap[$requestUri];


        if (isset($_GET['a']) == 'action') {
            $obj->action($_GET['actionType'], $_GET['id']);
            print_r($obj->display());
        } else {
            print_r($obj->display());
        }

    } else {
        echo \Views\View::getTemplateFromFile('_notfoundpage');
    }
} else {
    echo \Views\View::getTemplateFromFile('_notfoundpage');
}
echo \Views\View::getTemplateFromFile('_footer');