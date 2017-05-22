<?php

return [
    "cache" => [
        "volatile" => [
            "host" => "127.0.0.1",
            "port" => "11211",
            "options" => [
            ]
        ],
        "filesystem" => [
            "response" => [
                "path" => "data/cache/response"
            ],
            "serializer" => [
                "path" => "data/cache/serializer"
            ]
        ]
    ]
];