<?php


namespace App\Startup;


use App\Core\Abstracts\Singleton;
use App\Core\Interfaces\ProviderInterface;
use Klein\Klein;

final class RouterProvider extends Singleton implements ProviderInterface
{

    protected static $running = false;
    protected static $router;

    static function init()
    {
        self::start(function () {
            new static();
        });
    }

    private function __construct()
    {
        self::$router = new Klein();
        $this->mapRoutes('web');
        self::$router->dispatch();
    }

    private function mapRoutes(string $name)
    {
        $router = self::$router;
        require_once path( config('router.path') . "/{$name}.php" );
    }

    static function request() {
        return self::$router->request();
    }

    static function response()
    {
        return self::$router->response();
    }

}