<?php

require_once 'core/controller.php';
require_once 'core/database.php';
require_once 'core/identifier.php';

if (isset($_GET['url']))
    $url = explode('/', rtrim($_GET['url'], '/'));
else
    $url = array();

if (!empty($url[0])) {
    $controllerName = $url[0];
    if (isset($url[1])) {
        $method = $url[1];
    } else {
        $method = "index";
    }  
  $params = array_slice($url, 2);
  $controllerFile = "controllers/$controllerName.php";
}
else {
    require_once 'view/home.php';
    exit;
}

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerName();

    if (method_exists($controller, $method)) {
        call_user_func_array([$controller, $method], $params);
    } else {
        http_response_code(404);
        echo "Method not found!";
    }
} else {
    http_response_code(404);
    echo "Controller not found!";
}

?>