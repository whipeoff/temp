<?php
require __DIR__ . '/env_loader.php';

$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$dbname = getenv('DB_NAME');

if (!$host || !$user || !$dbname) {
    die("Ошибка: Не удалось прочитать данные для подключения к БД из .env. 
    Проверьте содержимое .env и путь в env_loader.php");
}

$mysqli = new mysqli($host, $user, $pass, $dbname);
if ($mysqli->connect_error) {
    die("Ошибка подключения к БД: " . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");
