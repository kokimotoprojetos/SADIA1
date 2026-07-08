<?php
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Http\Request;

error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', '1');

putenv('APP_KEY=' . (getenv('APP_KEY') ?: 'base64:VxaoMChWHud3bcKTOBgXhfvpLpadrEM2qqpM9Ls94ks='));
putenv('APP_DEBUG=true');
putenv('APP_ENV=production');
putenv('DB_CONNECTION=mysql');
putenv('DB_HOST=mysql-fc12bbd-kokimot.b.aivencloud.com');
putenv('DB_PORT=28994');
putenv('DB_DATABASE=defaultdb');
putenv('DB_USERNAME=avnadmin');
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

// ── Rota de migração e setup ─────────────────────────────────────────────
$uri = strtok($_SERVER['REQUEST_URI'] ?? '', '?');
if ($uri === '/migrate') {
    header('Content-Type: text/plain');
    $artisan = $app->make(ConsoleKernel::class);
    $exitCode = $artisan->call('migrate', ['--force' => true]);
    echo "Exit Code: $exitCode\n" . $artisan->output();
    exit;
}
if ($uri === '/setup') {
    header('Content-Type: text/plain');
    try {
        $pdo = new PDO(
            'mysql:host=' . (getenv('DB_HOST') ?: 'mysql-fc12bbd-kokimot.b.aivencloud.com') . ';port=' . (getenv('DB_PORT') ?: '28994') . ';dbname=' . (getenv('DB_DATABASE') ?: 'defaultdb'),
            getenv('DB_USERNAME') ?: 'avnadmin',
            getenv('DB_PASSWORD') ?: '',
            [
                PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
                PDO::MYSQL_ATTR_MULTI_STATEMENTS => true,
            ]
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = file_get_contents(__DIR__ . '/../install/database.sql');
        $sql = preg_replace('/CREATE\s+TABLE\s+(IF NOT EXISTS\s+)?/i', 'CREATE TABLE IF NOT EXISTS ', $sql);
        $sql = preg_replace('/INSERT\s+(IGNORE\s+)?INTO\s+/i', 'INSERT IGNORE INTO ', $sql);
        $pdo->query('SET NAMES utf8mb4');

        $tables = $pdo->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = '" . (getenv('DB_DATABASE') ?: 'defaultdb') . "'")->fetchAll(PDO::FETCH_COLUMN);
        foreach ($tables as $table) {
            $pdo->exec("DROP TABLE IF EXISTS `$table`");
        }

        $statements = preg_split('/;\s*\n/', $sql);
        $count = 0;
        foreach ($statements as $stmt) {
            $stmt = trim($stmt);
            if ($stmt === '') continue;
            $pdo->exec($stmt . ';');
            $count++;
        }

        $pdo->exec("UPDATE `general_settings` SET `active_template` = 'invester'");

        echo "Database setup completed! Dropped " . count($tables) . " tables, executed $count statements.";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    exit;
}

$kernel = $app->make(Kernel::class);
$response = $kernel->handle(
    $request = Request::capture()
)->send();
$kernel->terminate($request, $response);
