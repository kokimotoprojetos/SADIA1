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
            [PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false]
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo->exec("CREATE TABLE IF NOT EXISTS `general_settings` (
            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `cur_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `cur_sym` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `email_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `email_template` text COLLATE utf8mb4_unicode_ci,
            `sms_api` text COLLATE utf8mb4_unicode_ci,
            `base_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `secondary_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `mail_config` text COLLATE utf8mb4_unicode_ci,
            `sms_config` text COLLATE utf8mb4_unicode_ci,
            `global_shortcodes` text COLLATE utf8mb4_unicode_ci,
            `firebase_config` text COLLATE utf8mb4_unicode_ci,
            `off_day` text COLLATE utf8mb4_unicode_ci,
            `f_charge` decimal(18,8) NOT NULL DEFAULT 0.00000000,
            `p_charge` decimal(18,8) NOT NULL DEFAULT 0.00000000,
            `signup_bonus_amount` decimal(18,2) NOT NULL DEFAULT 0.00,
            `signup_bonus_control` tinyint(1) NOT NULL DEFAULT 0,
            `push_notify` tinyint(1) NOT NULL DEFAULT 0,
            `kv` tinyint(1) NOT NULL DEFAULT 0,
            `ev` tinyint(1) NOT NULL DEFAULT 0,
            `en` tinyint(1) NOT NULL DEFAULT 1,
            `sv` tinyint(1) NOT NULL DEFAULT 0,
            `sn` tinyint(1) NOT NULL DEFAULT 0,
            `b_transfer` tinyint(1) NOT NULL DEFAULT 0,
            `promotional_tool` tinyint(1) NOT NULL DEFAULT 0,
            `holiday_withdraw` tinyint(1) NOT NULL DEFAULT 0,
            `force_ssl` tinyint(1) NOT NULL DEFAULT 0,
            `secure_password` tinyint(1) NOT NULL DEFAULT 0,
            `registration` tinyint(1) NOT NULL DEFAULT 1,
            `agree` tinyint(1) NOT NULL DEFAULT 0,
            `maintenance_mode` tinyint(1) NOT NULL DEFAULT 0,
            `language_switch` tinyint(1) NOT NULL DEFAULT 0,
            `created_at` timestamp NULL DEFAULT NULL,
            `updated_at` timestamp NULL DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

        $stmt = $pdo->query("SELECT COUNT(*) FROM `general_settings`");
        if ($stmt->fetchColumn() == 0) {
            $pdo->exec("INSERT INTO `general_settings` (`site_name`, `cur_text`, `cur_sym`, `base_color`, `secondary_color`, `registration`) VALUES ('SADIA', 'USD', '$', '000000', '000000', 1)");
        }

        echo "Tables created successfully!";
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
