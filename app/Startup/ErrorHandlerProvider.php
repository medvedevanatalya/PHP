<?php


namespace App\Startup;


use App\Core\Abstracts\Singleton;
use App\Core\Interfaces\ProviderInterface;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class ErrorHandlerProvider extends Singleton implements ProviderInterface
{
    protected static $running = false;

    static  function init()
    {
        self::start(function (){
            self::handle();
        });
    }

    private static function handle()
    {
        $debug = config('app.debug') === true;

        if($debug)
        {
            $handler = new Run();
            $handler->appendHandler(new PrettyPageHandler());
            $handler->register();
        }

        error_reporting(E_ALL * $debug);
    }
}