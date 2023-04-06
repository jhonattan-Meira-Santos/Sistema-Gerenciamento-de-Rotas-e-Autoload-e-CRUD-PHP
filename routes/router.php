<?php

function load(string $controller, string $action) {
    try 
    {
        $controllerNamespace = "Bolao\\Classe\\{$controller}";
        if(! class_exists($controllerNamespace)){
            throw new Exception("O controller {$controller} não existe");
        }
        
        $controllerInstance = new $controllerNamespace();
    
        if(! method_exists($controllerInstance, $action)) {
            throw new Exception("O método {$action} não existe no controller {$controller}");
        }
    
        $controllerInstance->$action((object) $_REQUEST);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

$routes = [
    'GET' => [
        '/' => load("HomeController", "index"),
        '/index' => load("HomeController", "index"),
        // '/' => fn() => load("HomeController", "index"),
    ],
    'POST' => [
        // 'index' => load("controllers", "index"),
        'index' => fn() => load("HomeController", "index"),
    ]
];