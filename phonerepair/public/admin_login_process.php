<?php
session_start();
require 'includes/db.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if($username && $password) {
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $res = $stmt->get_result();
    $user = $res->fetch_assoc();
    $stmt->close();

    if($user && password_verify($password, $user['password_hash'])){
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_requests.php");
        exit;
    } else {
        echo "Неверный логин или пароль!";
    }
} else {
    echo "Введите логин и пароль.";
}
