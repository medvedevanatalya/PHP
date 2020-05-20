<?php


namespace App;


use App\Core\Abstracts\Singleton;


final class Startup extends Singleton
{
    protected static $running = false;

    static function init()
    {
        self::start(function (){
            new static();
        });
    }

    private function __construct()
    {
        $this->registerProviders();
    }

    private function registerProviders()
    {
        foreach (config('app.providers') as $provider)
        {
            call_user_func([$provider, 'init']);
        }
    }

}