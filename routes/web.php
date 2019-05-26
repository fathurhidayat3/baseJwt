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

$router->post('/login', function () {
    $token = app('auth')->attempt(app('request')->only('email', 'password'));

    return response()->json(compact('token'));
});

$router->group([
    'middleware' => 'auth',
], function ($router) {
    $router->get('/me', function () {
        return app('request')->user();
    });
});
