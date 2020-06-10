<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../app/controllers/CoreController.php';
require_once __DIR__ . '/../app/controllers/MainController.php';
require_once __DIR__ . '/../app/controllers/CatalogController.php';

require_once __DIR__ . '/../app/models/CoreModel.php'; 
require_once __DIR__ . '/../app/utils/Database.php';
require_once __DIR__ . '/../app/models/Product.php'; 
require_once __DIR__ . '/../app/models/Type.php';
require_once __DIR__ . '/../app/models/Brand.php';
require_once __DIR__ . '/../app/models/Category.php';

// $pdo = Database::getPDO();

// $statement = $pdo->query('SELECT * FROM product');
// dump($statement->fetchAll(PDO::FETCH_ASSOC));

$router = new AltoRouter();

$router->setBasePath($_SERVER['BASE_URI']);

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
    '/test', 
    [
        'method' => 'test',
        'controller' => 'MainController'
    ],
    'test-oui' 
);

$router->map( 
    'GET', 
    '/legal-mentions', 
    [
        'method' => 'legalMentions',
        'controller' => 'MainController'
    ],
    'legal-mentions' 
);

$router->map( 
    'GET', 
    '/catalog/category/[i:categoryId]', 
    [
        'method' => 'category',
        'controller' => 'CatalogController'
    ],
    'route_category_by_id' 
);

$router->map( 
    'GET', 
    '/catalog/type/[i:typeId]', 
    [
        'method' => 'type',
        'controller' => 'CatalogController'
    ],
    'route_type_by_id' 
);

$router->map( 
    'GET', 
    '/catalog/brand/[i:brandId]', 
    [
        'method' => 'brand',
        'controller' => 'CatalogController'
    ],
    'route_brand_by_id' 
);

$router->map( 
    'GET', 
    '/catalog/product/[i:productId]', 
    [
        'method' => 'product',
        'controller' => 'CatalogController'
    ],
    'route_product_by_id' 
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