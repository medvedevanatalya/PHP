<?php

use Klein\Klein;
/**
 * @var Klein $router
 */

$router->get('/?', action('SiteController@index'));

$router->post('/books/?', action('BookController@store'));
$router->post('/books/delete/[i:id]/?', action('BookController@delete'));



