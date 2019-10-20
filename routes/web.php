<?php

$app['router']->get('/', function () {
    return 'hello world';
});

$app['router']->get('getHelloController', 'App\Http\Controllers\HelloController@getHelloController');

$app['router']->get('getHelloModel', 'App\Http\Controllers\HelloController@getHelloModel');

$app['router']->get('getHelloView', 'App\Http\Controllers\HelloController@getHelloView');