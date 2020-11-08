<?php 

// Inclusion de mes librairies externes gérées par Composer
require __DIR__ . '/../vendor/autoload.php';

// Instanciation de AltoRouter
$router = new AltoRouter();

// Définition du basepath
$router->setBasePath($_SERVER['BASE_URI']);

// Liste des routes
$router->map(
    'GET',  
    '/',    
    [       
        'controller' => 'MainController',
        'method' => 'home'
    ],
    'home' 
);

$router->map(
    'GET',  
    '/type-list/[i:type_id]',    
    [       
        'controller' => 'CreateController',
        'method' => 'typeList'
    ],
    'type_list'  
);

$router->map(
    'GET',  
    '/details/[i:details_id]',    
    [       
        'controller' => 'CreateController',
        'method' => 'details'
    ],
    'details'  
);

$router->map(
    'GET',  
    '/types',    
    [       
        'controller' => 'CreateController',
        'method' => 'types'
    ],
    'types'  
);
// Mise en place du matching et du dispatcher
$match = $router->match();

// Si ça match :-)
if ($match) {

    $controllerToUse = 'Pokedex\Controllers\\'.$match['target']['controller'];
    $methodToCall = $match['target']['method'];
    $arguments = $match['params'];


// Si ça match pas :-(
} else {

    $controllerToUse = 'Pokedex\Controllers\MainController';
    $methodToCall = 'page404';
    $arguments = [];
}

// Instanciation du controller et de la méthode
$myController = new $controllerToUse($router);
$myController->$methodToCall($arguments);
