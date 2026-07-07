<?php
header('Content-Type: text/plain');
echo "BEFORE\n";

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define("LARAVEL_START", microtime(true));
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', '0');

echo "AFTER define\n";

if (!is_dir("/tmp/storage")) {
    @mkdir("/tmp/storage", 0777, true);
}

if (file_exists($maintenance = __DIR__."/../core/storage/framework/maintenance.php")) {
    require $maintenance;
}

echo "BEFORE require vendor\n";
try {
    require __DIR__."/../core/vendor/autoload.php";
    echo "AFTER vendor\n";
    $app = require_once __DIR__."/../core/bootstrap/app.php";
    echo "AFTER bootstrap\n";
    $app->useStoragePath("/tmp/storage");
    $kernel = $app->make(Kernel::class);
    echo "AFTER kernel\n";
    $response = $kernel->handle(
        $request = Request::capture()
    )->send();
    $kernel->terminate($request, $response);
} catch (\Throwable $e) {
    echo "Fatal error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "Trace: " . $e->getTraceAsString();
}
