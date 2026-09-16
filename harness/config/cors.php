<?php

return [

    // Includes 'discord/*' so the Swagger UI container (a different origin,
    // localhost:8081) is allowed to call this harness's test routes from the
    // browser via "Try it out". Local dev harness only -- not part of the
    // published package.
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'discord/*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
