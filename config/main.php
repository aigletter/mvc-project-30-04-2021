<?php

return [
    'services' => [
        'cache' => [
            'factory' => \core\Services\Cache\CacheFactory::class,
        ],
        'router' => [
            'factory' => \core\Services\Routing\RouterFactory::class,
        ],
        'files' => [
            'factory' => \core\Services\Files\FileFactory::class,
        ],
        'logger' => [
            'factory' => \core\Services\Logging\LoggerFactory::class
        ],
        'db' => [
            'factory' => \core\Services\Database\DatabaseFactory::class,
        ]
    ]
];