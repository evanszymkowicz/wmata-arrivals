<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->get('/', [
    'as' => 'index', 'uses' => 'WebController@index'
]);


// adopted from the Laravel/Lumen documentation:
// Route groups allow you to share route attributes
// such as middleware or namespaces across a large number of routes without needing to define those attributes on each individual route.
// Shared attributes are specified in an array format as the first parameter to the $router->group method.


$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/lines/{line}', [
        'as' => 'lines.show', 'uses' => 'WebAPIController@index'
    ]);
    $router->get('/stations/{station}', [
        'as' => 'stations.show', 'uses' => 'WebAPIController@show'
    ]);
});
