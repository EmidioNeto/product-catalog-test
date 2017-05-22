<?php

return [
    'doctrine' => [
        'configuration' => [
            'auto_generate_proxy_classes' => true,
            'proxy_dir' => 'data/cache/Doctrine/Proxy',
            'proxy_namespace' => 'Doctrine\Proxy',
            'underscore_naming_strategy' => true,
            'second_level_cache_enabled' => true,
            'metadata_cache' => 'redis',
            'query_cache' => 'redis',
            'result_cache' => 'redis',
        ],
        'connection' => [
            'orm_dafiti' => [
                'driverClass' => 'Doctrine\DBAL\Driver\Mysqli\Driver',
                'host' => 'localhost',
                'port' => '3306',
                'dbname' => 'dafiti',
                'user' => 'root',
                'password' => '',
                'charset' => 'UTF8',
            ],
        ],
        'entitymanager' => [
            'orm_dafiti' => [
                'connection' => 'orm_dafiti',
            ],
        ]
    ],
];
