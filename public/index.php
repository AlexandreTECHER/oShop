<?php

require_once __DIR__ . '/../app/controllers/MainController.php';

if(isset($_GET['_url'])){
    $currentPage = $_GET['_url'];
}else{
    $currentPage = '/';
}

$routes = [
    '/' => 'test',

];

if(!array_key_exists($currentPage, $routes)){
    $mainController = new MainController();
    $mainController->error();
}

$methodeToUse = $routes[$currentPage];

$mainController = new MainController();
$mainController->$methodeToUse();