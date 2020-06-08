<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/controllers/MainController.php';

$router = new AltoRouter();

$router->setBasePath($_SERVER['BASE_URI']);

// if(isset($_GET['_url'])){
//     $currentPage = $_GET['_url'];
// }else{
//     $currentPage = '/';
// }


$router->map( 
    'GET', 
    '/', 
    [
        'method' => 'homepage',
        'controller' => 'MainController'
    ],
    'homepage' 
);

$router->map( 
    'GET', 
    '/catalog/category/[i:categoryId]', 
    [
        'method' => 'category',
        'controller' => 'MainController'
    ],
    'catalog-category' 
);


$match = $router->match();

$methodeToUse = $match['target']['method'];
$controllerToUse = $match['target']['controller'];


if(!$match){
    $mainController = new MainController();
    $mainController->error();
}


$mainController = new $controllerToUse();
$mainController->$methodeToUse($match['params']);