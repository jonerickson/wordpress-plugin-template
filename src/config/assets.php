<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Assets Manifest
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default asset manifest that should be used.
    | The "theme" manifest is recommended as the default as it cedes ultimate
    | authority of your application's assets to the theme.
    |
    */

    'default' => 'theme',

    /*
    |--------------------------------------------------------------------------
    | Assets Manifests
    |--------------------------------------------------------------------------
    |
    | Manifests contain lists of assets that are referenced by static keys that
    | point to dynamic locations, such as a cache-busted location. We currently
    | support two types of manifest:
    |
    | assets: key-value pairs to match assets to their revved counterparts
    |
    | bundles: a series of entrypoints for loading bundles
    |
    */

    'manifests' => [
        'theme' => [
            'path' => plugin_dir_path(__DIR__),
            'url' => plugin_dir_url(__DIR__).'public',
            'assets' => plugin_dir_path(__DIR__).'public/manifest.json',
            'bundles' => plugin_dir_path(__DIR__).'public/entrypoints.json',
        ],
    ],
];
