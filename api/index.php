<?php
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
define('LARAVEL_START', microtime(true));
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', '0');
if (!is_dir("/tmp/storage")) {
    @mkdir("/tmp/storage", 0777, true);
}
if (file_exists($maintenance = __DIR__."/../core/storage/framework/maintenance.php")) {
    require $maintenance;
}
try {
    require __DIR__."/../core/vendor/autoload.php";
    $app = require_once __DIR__."/../core/bootstrap/app.php";
    $app->useStoragePath("/tmp/storage");
    $kernel = $app->make(Kernel::class);
    $response = $kernel->handle(
        $request = Request::capture()
    )->send();
    $kernel->terminate($request, $response);
} catch (\Throwable $e) {
    echo "Error: " . $e->getMessage() . "\nFile: " . $e->getFile() . ":" . $e->getLine() . "\n" . $e->getTraceAsString();
}
