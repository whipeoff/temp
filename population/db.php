<?php
require_once 'env.php';
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$conn->set_charset("utf8mb4");
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>
