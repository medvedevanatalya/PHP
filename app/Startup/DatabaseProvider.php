<?php


namespace App\Startup;


use ActiveRecord\Config;
use App\Core\Abstracts\Singleton;
use App\Core\Interfaces\ProviderInterface;

class DatabaseProvider extends Singleton implements ProviderInterface
{

    protected static $running = false;

    static function init()
    {
        self::start(function (){
            new self();
        });
    }

    public function __construct()
    {
        /** @var Config $activeRecord */
        $activeRecord = Config::instance();
        $activeRecord->set_connections($this->getConnections());
        $activeRecord->set_default_connection($this->getDefault());
        $activeRecord->set_model_directory(path('app/Models'));
    }

    private function getDefault()
    {
        return config('database.default', 'mysql');
    }

    private function getConnections()
    {
        return config('database.connections', []);
    }
}