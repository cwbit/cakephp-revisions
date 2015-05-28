<?php
use Cake\Routing\Router;

Router::plugin('Revisions', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});
