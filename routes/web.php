<?php

$app['router']->get('', function () {
    return 'hello world';
});

$app['router']->get('getHelloControler', 'App\Http\Controllers\HelloController@getHelloControler');

$app['router']->get('getHelloModel', 'App\Http\Controllers\HelloController@getHelloModel');

$app['router']->get('getHelloView', 'App\Http\Controllers\HelloController@getHelloView');