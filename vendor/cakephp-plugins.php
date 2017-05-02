<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'AuthUser' => $baseDir . '/plugins/AuthUser/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Prints' => $baseDir . '/plugins/Prints/',
        'Template' => $baseDir . '/plugins/Template/'
    ]
];