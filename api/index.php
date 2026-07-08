<?php
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', '1');
putenv('APP_KEY=base64:VxaoMChWHud3bcKTOBgXhfvpLpadrEM2qqpM9Ls94ks=');
putenv('APP_DEBUG=true');

if (!is_dir("/tmp/storage")) {
    @mkdir("/tmp/storage", 0777, true);
}
if (!is_dir(__DIR__.'/../core/bootstrap/cache')) {
    @mkdir(__DIR__.'/../core/bootstrap/cache', 0777, true);
}

if (file_exists($maintenance = __DIR__."/../core/storage/framework/maintenance.php")) {
    require $maintenance;
}

echo "BEFORE_VENDOR\n";
try {
    require __DIR__."/../core/vendor/autoload.php";
    echo "AFTER_VENDOR\n";
    $app = require_once __DIR__."/../core/bootstrap/app.php";
    echo "AFTER_APP\n";
    $app->useStoragePath("/tmp/storage");
    $kernel = $app->make(Kernel::class);
    echo "AFTER_KERNEL\n";
    $response = $kernel->handle(
        $request = Request::capture()
    )->send();
    $kernel->terminate($request, $response);
} catch (\Throwable $e) {
    http_response_code(200);
    header('Content-Type: text/plain; charset=utf-8');
    echo "=== ERROR ===\n";
    echo $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo $e->getTraceAsString() . "\n";
}

