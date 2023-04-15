<?php

require "../vendor/autoload.php";
require "../routes/router.php";

try{
    $uri = parse_url($_SERVER['REQUEST_URI'])["path"];
    $request = $_SERVER["REQUEST_METHOD"];
    /* Defensiva para verificar se o Metodo Existe na rota */
    if(! isset($router[$request]) || ! array_key_exists($uri, $router[$request])) {
        throw new Exception("A rota não existe");
    }

    $controller = $router[$request][$uri]; 

    $controller();
} catch (Exception $e) {
    $e->getMessage();
}

?>