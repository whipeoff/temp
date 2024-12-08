<?php
$envFile = __DIR__ . '/../../.env'; 
if (!file_exists($envFile)) {

    die("Файл .env не найден по пути: $envFile");
}

$lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if (!$lines) {
    die("Файл .env пустой или не может быть прочитан");
}

foreach ($lines as $line) {
    if (strpos(trim($line), '#') === 0) continue;
    $parts = explode('=', $line, 2);
    if (count($parts) == 2) {
        $name = trim($parts[0]);
        $value = trim($parts[1]);
        putenv("$name=$value");
    }
}
