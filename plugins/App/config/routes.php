<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/app', ['plugin'=>'App', 'controller' => 'settings', 'action' => 'index']);
    $routes->fallbacks(DashedRoute::class);
});


Router::plugin(
    'App',
    ['path' => '/app'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);
