<?php

$url = $_GET['url'] ?? 'login';
$url = explode('/', rtrim($url, '/'));

$controllerName = 'AuthController';
$methodName = 'login';

if ($url[0] == 'register') {
    $methodName = 'register';
} elseif ($url[0] == 'logout') {
    $methodName = 'logout';
} elseif ($url[0] == 'dashboard') {
    $controllerName = 'DashboardController';
    $methodName = 'index';
} elseif ($url[0] == 'monitoring') {
    $controllerName = 'MonitoringController';
    $methodName = $url[1] ?? 'index';
}

if (class_exists($controllerName)) {
    $controller = new $controllerName();
    if (method_exists($controller, $methodName)) {
        $controller->$methodName();
    } else {
        die("Method $methodName not found in $controllerName");
    }
} else {
    die("Controller $controllerName not found");
}
