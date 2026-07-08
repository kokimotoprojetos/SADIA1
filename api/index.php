<?php
$dir = __DIR__.'/../core/bootstrap/cache';
if (is_dir($dir)) {
    $files = scandir($dir);
    header('Content-Type: application/json');
    echo json_encode(['cache_exists'=>true,'files'=>$files]);
} else {
    header('Content-Type: application/json');
    echo json_encode(['cache_exists'=>false]);
}

