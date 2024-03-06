<?php

require_once './vendor/autoload.php';
require_once './Routes/routes.php';


$requestUri = $_SERVER['REQUEST_URI'];
$parts = explode('/', $requestUri);
session_start();

// Get the path
$path = implode('/', $parts);

// Check if the route exists
if (array_key_exists($path, $routes)) {
    $route = $routes[$path];
    $controllerName =  $route[0];
    if (class_exists($controllerName)) {
        $controller = new $controllerName();

        $method = $route[1];
        if (method_exists($controller, $method)) {
           $controller->$method();
        } else {
            // Handle method not found
            http_response_code(404);
            echo '404 Not Found Before';
        }
    } else {
        // Handle controller not found
        http_response_code(404);
        echo '404 Not Found Now';
    }
} else {
    // Handle route not found
    http_response_code(404);
    echo '404 Not Found Here';
}
