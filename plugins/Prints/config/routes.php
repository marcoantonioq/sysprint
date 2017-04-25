<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'printers', 'action' => 'index']);
    $routes->fallbacks(DashedRoute::class);
});


Router::plugin(
    'Prints',
    ['path' => '/prints'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);
