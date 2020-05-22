<?php

use App\Startup\DatabaseProvider;
use App\Startup\ErrorHandlerProvider;
use App\Startup\RouterProvider;
use App\Startup\ViewProvider;

return [
    'name' => 'TODO list!',
    'debug' => true,

    'providers' => [
        ErrorHandlerProvider::class,
        DatabaseProvider::class,
        ViewProvider::class,
        RouterProvider::class,
    ]
];