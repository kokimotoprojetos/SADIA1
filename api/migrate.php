<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', '1');

define('LARAVEL_START', microtime(true));

@mkdir('/tmp/storage', 0777, true);
@mkdir('/tmp/storage/logs', 0777, true);
@mkdir('/tmp/storage/framework', 0777, true);
@mkdir('/tmp/storage/framework/cache', 0777, true);
@mkdir('/tmp/storage/framework/sessions', 0777, true);
@mkdir('/tmp/storage/framework/views', 0777, true);
@mkdir('/tmp/bootstrap-cache', 0777, true);
@mkdir('/tmp/bootstrap-cache/cache', 0777, true);

require __DIR__."/../core/vendor/autoload.php";

$app = require_once __DIR__."/../core/bootstrap/app.php";
$app->useStoragePath('/tmp/storage');
$app->instance('path.bootstrap', '/tmp/bootstrap-cache');

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$exitCode = $kernel->call('migrate', ['--force' => true]);
$output = $kernel->output();

header('Content-Type: text/plain');
echo "Exit Code: $exitCode\n";
echo $output;
