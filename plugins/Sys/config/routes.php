<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/sys', ['plugin'=>'Sys', 'controller' => 'settings', 'action' => 'index']);
    $routes->fallbacks(DashedRoute::class);
});


Router::plugin(
    'Sys',
    ['path' => '/sys'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);
