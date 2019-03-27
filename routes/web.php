<?php

/*
|--------------------------------------------------------------------------
| routerlication Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an routerlication.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', ['as' => 'home', 'uses' => 'HomeController@home']);
$router->group(['prefix' => '/blog', 'as' => 'blog'], function () use ($router) {
    $router->get('/', ['as' => 'index', 'uses' => 'BlogController@index']);
    $router->get('/feed', ['as' => 'feed', 'uses' => 'BlogController@feed']);
    $router->get('/{slug}', ['as' => 'view', 'uses' => 'BlogController@view']);
});
$router->group(['prefix' => '/docs', 'as' => 'docs'], function () use ($router) {
    $router->get('/', ['as' => 'index', 'uses' => 'DocsController@index']);
    $router->get('/{slug}', ['as' => 'view', 'uses' => 'DocsController@view']);
});
