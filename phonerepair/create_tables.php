<?php
require __DIR__ . '/public/includes/env_loader.php';

$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$dbname = getenv('DB_NAME');

$mysqli = new mysqli($host, $user, $pass, $dbname);
if ($mysqli->connect_error) {
    die("Ошибка подключения к БД: " . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");

$mysqli->query("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$mysqli->query("CREATE TABLE IF NOT EXISTS requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    phone_model VARCHAR(255) NOT NULL,
    repair_description TEXT,
    contact_info VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$mysqli->query("CREATE TABLE IF NOT EXISTS specialists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    specialty VARCHAR(255) NOT NULL,
    description TEXT,
    photo VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$adminUsername = 'admin';
$adminPasswordHash = password_hash('admin', PASSWORD_BCRYPT);
$stmt = $mysqli->prepare("INSERT IGNORE INTO users (username, password_hash) VALUES (?, ?)");
$stmt->bind_param('ss', $adminUsername, $adminPasswordHash);
$stmt->execute();
$stmt->close();

echo "Таблицы созданы или уже существуют, администратор добавлен (логин: admin, пароль: admin).";
