<?php

use App\Startup\DatabaseProvider;
use App\Startup\ErrorHandlerProvider;
use App\Startup\RouterProvider;
use App\Startup\ViewProvider;

return [
    'name' => 'MVC!',
    'debug' => true,

    'providers' => [
        ErrorHandlerProvider::class,
        DatabaseProvider::class,
        ViewProvider::class,
        RouterProvider::class,
    ]
];