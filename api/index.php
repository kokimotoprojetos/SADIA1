<?php
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

ob_start();
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', '0');

putenv('APP_KEY=' . (getenv('APP_KEY') ?: 'base64:VxaoMChWHud3bcKTOBgXhfvpLpadrEM2qqpM9Ls94ks='));
putenv('APP_DEBUG=' . (getenv('APP_DEBUG') ?: 'true'));
putenv('APP_ENV=' . (getenv('APP_ENV') ?: 'production'));
putenv('DB_CONNECTION=' . (getenv('DB_CONNECTION') ?: 'mysql'));
putenv('DB_HOST=' . (getenv('DB_HOST') ?: 'mysql-fc12bbd-kokimot.b.aivencloud.com'));
putenv('DB_PORT=' . (getenv('DB_PORT') ?: '28994'));
putenv('DB_DATABASE=' . (getenv('DB_DATABASE') ?: 'defaultdb'));
putenv('DB_USERNAME=' . (getenv('DB_USERNAME') ?: 'avnadmin'));
putenv('MYSQL_ATTR_SSL_VERIFY_SERVER_CERT=false');

define('LARAVEL_START', microtime(true));

// ── Vercel serverless: criar pastas gravávels em /tmp ─────────────────────────
@mkdir('/tmp/storage', 0777, true);
@mkdir('/tmp/storage/app', 0777, true);
@mkdir('/tmp/storage/app/public', 0777, true);
@mkdir('/tmp/storage/framework', 0777, true);
@mkdir('/tmp/storage/framework/cache', 0777, true);
@mkdir('/tmp/storage/framework/cache/data', 0777, true);
@mkdir('/tmp/storage/framework/sessions', 0777, true);
@mkdir('/tmp/storage/framework/testing', 0777, true);
@mkdir('/tmp/storage/framework/views', 0777, true);
@mkdir('/tmp/storage/logs', 0777, true);
@mkdir('/tmp/bootstrap-cache', 0777, true);
@mkdir('/tmp/bootstrap-cache/cache', 0777, true);

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
