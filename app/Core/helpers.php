<?php

use App\Startup\RouterProvider;
use App\Startup\ViewProvider;

function path(string $path = '') {

    $base_path = getcwd() . DIRECTORY_SEPARATOR . '..';
    $base_path = realpath( $base_path ) . DIRECTORY_SEPARATOR;

    $path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
    $path = trim($path, DIRECTORY_SEPARATOR);

    $path = $base_path . $path;
    $res = realpath( $path );

    if ( ! empty($res) )
        return $res;

    return $path;
}

function config(string $name, $default = null) {
    $keys = explode('.', $name);
    $name = array_shift($keys);

    $path = path("config/{$name}.php");

    if ( !is_file($path) ) {
        return $default;
    }

    $result = include $path;

    foreach ($keys as $key) {
        $result = $result[$key] ?? null;
    }

    return $result ?? $default;
}

function action(string $action)
{
    $action = explode('@', $action);

    $className = array_shift($action);
    $methodName = array_shift($action);

    $className = "App\Controllers\\" . $className;

    return function () use($className, $methodName){
        $class = new $className();
        return call_user_func([$class, $methodName]);
    };
}

function request()
{
    return RouterProvider::request();
}

function response()
{
    return RouterProvider::response();
}

function view(string $template, array $variables = []) {
    $engine = ViewProvider::engine();

    foreach ($variables as $key => $value)
        $engine->assign($key, $value);

    $extension = config('views.extension', '.tpl');
    return $engine->fetch( $template . $extension);
}