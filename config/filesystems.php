<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => rtrim(env('APP_URL', 'http://localhost'), '/').'/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        // Organigrama: almacena en public para evitar dependencia de storage:link en producción
        'organigrama' => [
            'driver' => 'local',
            'root' => public_path('images/organigrama'),
            'url' => rtrim(env('APP_URL', 'http://localhost'), '/').'/images/organigrama',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'docentes_public' => [
            'driver' => 'local',
            'root' => public_path('images/docentes'),
            'url' => rtrim(env('APP_URL', 'http://localhost'), '/').'/images/docentes',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'docentes_cvs_public' => [
            'driver' => 'local',
            'root' => public_path('images/docentes/cvs'),
            'url' => rtrim(env('APP_URL', 'http://localhost'), '/').'/images/docentes/cvs',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'paginas_banners' => [
            'driver' => 'local',
            'root' => public_path('images/paginas/banners'),
            'url' => rtrim(env('APP_URL', 'http://localhost'), '/').'/images/paginas/banners',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'autoridades_public' => [
            'driver' => 'local',
            'root' => public_path('images/autoridades'),
            'url' => rtrim(env('APP_URL', 'http://localhost'), '/').'/images/autoridades',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'bienestar_public' => [
            'driver' => 'local',
            'root' => public_path('images/bienestar'),
            'url' => rtrim(env('APP_URL', 'http://localhost'), '/').'/images/bienestar',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
