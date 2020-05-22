<?php

use Klein\Klein;
/**
 * @var Klein $router
 */

$router->get('/?', action('TodoController@index'));

$router->with('/todos', function () use ($router){
    $router->post('/store/?', action('TodoController@store'));
    $router->post('/update/[i:id]/?', action('TodoController@update'));
    $router->post('/delete/[i:id]/?', action('TodoController@delete'));
    $router->post('/toggle/[i:id]/?', action('TodoController@toggle'));

});



