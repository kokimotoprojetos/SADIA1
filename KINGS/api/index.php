<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__.'/../core/storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../core/vendor/autoload.php';

$app = require_once __DIR__.'/../core/bootstrap/app.php';

// Ensure the storage directory exists in /tmp
if (!file_exists('/tmp/storage/framework/views')) {
    mkdir('/tmp/storage/framework/views', 0777, true);
}
if (!file_exists('/tmp/storage/framework/cache/data')) {
    mkdir('/tmp/storage/framework/cache/data', 0777, true);
}
if (!file_exists('/tmp/storage/framework/sessions')) {
    mkdir('/tmp/storage/framework/sessions', 0777, true);
}
if (!file_exists('/tmp/storage/logs')) {
    mkdir('/tmp/storage/logs', 0777, true);
}

// Set storage path to /tmp for Vercel
$app->useStoragePath('/tmp/storage');

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
