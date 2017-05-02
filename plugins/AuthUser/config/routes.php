<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/auth-user', ['plugin'=>'AuthUser', 'controller' => 'Users', 'action' => 'view']);
    $routes->fallbacks(DashedRoute::class);
});

Router::plugin(
    'AuthUser',
    ['path' => '/auth-user'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);
