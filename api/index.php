<?php
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

ob_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

putenv('APP_KEY=base64:VxaoMChWHud3bcKTOBgXhfvpLpadrEM2qqpM9Ls94ks=');
putenv('APP_DEBUG=true');
putenv('APP_ENV=production');
putenv('DB_CONNECTION=sqlite');
putenv('DB_DATABASE=:memory:');

define('LARAVEL_START', microtime(true));

// ── Vercel serverless: criar pastas gravávels em /tmp ─────────────────────────
$tmpDirs = [
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/app/public',
    '/tmp/storage/framework',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/testing',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
    '/tmp/bootstrap-cache',
    '/tmp/bootstrap-cache/cache',
];
foreach ($tmpDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

if (file_exists($maintenance = __DIR__."/../core/storage/framework/maintenance.php")) {
    require $maintenance;
}

require __DIR__."/../core/vendor/autoload.php";

$app = require_once __DIR__."/../core/bootstrap/app.php";

// Redirecionar storage e bootstrap/cache para /tmp (gravável na Vercel)
$app->useStoragePath('/tmp/storage');
$app->instance('path.bootstrap', '/tmp/bootstrap-cache');

$kernel = $app->make(Kernel::class);
$response = $kernel->handle(
    $request = Request::capture()
)->send();
$kernel->terminate($request, $response);
ob_end_flush();
