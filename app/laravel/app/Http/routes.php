<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version(
    'v1',
    function (Router $api) {
        $api->get('/user/me', 'App\Http\Controllers\User@me');
        $api->post('/user', 'App\Http\Controllers\User@create');
        $api->post('/user/{id}', 'App\Http\Controllers\User@update');
        $api->get('/user/me/progress', 'App\Http\Controllers\Progress@index');
        $api->post('/user/me/progress', 'App\Http\Controllers\Progress@create');

        $api->get('/dayparts', 'App\Http\Controllers\Dayparts@index');

        $api->get('/categories', 'App\Http\Controllers\Categories@index');
        $api->get('/categories/{id}', 'App\Http\Controllers\Categories@show');

        $api->get('/subcategories', 'App\Http\Controllers\Subcategories@index');

        $api->get('/meals', 'App\Http\Controllers\Meals@index');
        $api->post('/meals', 'App\Http\Controllers\Meals@create');
        $api->get('/meals/search', 'App\Http\Controllers\Meals@search');

        $api->get('/brands/search', 'App\Http\Controllers\Brands@search');

        $api->get('/entries', 'App\Http\Controllers\Entries@index');
        $api->post('/entries', 'App\Http\Controllers\Entries@create');
        $api->get('/entries/{id}', 'App\Http\Controllers\Entries@show');
        $api->delete('/entries/{id}', 'App\Http\Controllers\Entries@delete');

        $api->post('/products', 'App\Http\Controllers\Products@create');
        $api->get('/products/search', 'App\Http\Controllers\Products@search');

        $api->get('/programs', 'App\Http\Controllers\Programs@index');
        $api->post('/programs', 'App\Http\Controllers\Programs@create');

        $api->post('/upload', 'App\Http\Controllers\Uploader@upload');
    }
);
