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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {

    $router->group(['prefix' => 'schedule'], function () use ($router) {
        $router->get('/', 'ScheduleController@getAll');
        $router->get('/{id}', 'ScheduleController@getOne');
        $router->post('/', 'ScheduleController@create');
        $router->put('/{id}', 'ScheduleController@update');
        $router->delete('/{id}', 'ScheduleController@delete');
    });

    $router->group(['prefix' => 'order'], function () use ($router) {
        $router->get('/{id}', 'OrderController@getOne');
        $router->post('/', 'OrderController@create');
        $router->put('/{id}/status', 'OrderController@updateStatus');
    });

    $router->group(['prefix' => 'report'], function () use ($router) {
        $router->get('/', 'ReportController@getGeneralReport');
        $router->get('/customer/{id}', 'ReportController@getCustomerReport');
        $router->get('/product/{id}', 'ReportController@getProductReport');
    });
});
