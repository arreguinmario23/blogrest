<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
//Ruta Login
$router->get('/login/{user}/{pass}', 'AuthController@login');

$router->group(['middleware'=>['auth']], function() use($router){
//Funciones para los usuarios
$router->get('/usuario', 'UserController@index');
$router->get('/usuario/{user}', 'UserController@get');
$router->post('/usuario', 'UserController@create');
$router->put('/usuario/{user}', 'UserController@update');
$router->delete('/usuario/{user}', 'UserController@destroy');
//Funciones para los topics
$router->get('/topico', 'TopicController@index');
$router->get('/topico/{topic}', 'TopicController@get');
$router->post('/topico', 'TopicController@create');
$router->put('/topico/{topic}', 'TopicController@update');
$router->delete('/topico/{topic}', 'TopicController@destroy');
//Funciones para los post
$router->get('/post', 'PostController@index');
$router->get('/post/{id}', 'PostController@get');
$router->post('/post', 'PostController@create');
$router->put('/post/{id}', 'PostController@update');
$router->delete('/post/{id}', 'PostController@destroy');
}
);   