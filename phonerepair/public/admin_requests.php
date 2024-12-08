<?php
session_start();
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true){
    header("Location: admin_login.php");
    exit;
}
$page_title = "Админ - Просмотр заявок";
$page_description = "Страница администратора для просмотра заявок на ремонт.";
include 'includes/header.php';
require 'includes/db.php';
?>
<h2>Список заявок</h2>
<?php
$result = $mysqli->query("SELECT * FROM requests ORDER BY created_at DESC");
if($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        echo "<div class='request-item'>
                <p><strong>ФИО:</strong> ".htmlspecialchars($row['full_name'])."</p>
                <p><strong>Модель:</strong> ".htmlspecialchars($row['phone_model'])."</p>
                <p><strong>Описание:</strong> ".htmlspecialchars($row['repair_description'])."</p>
                <p><strong>Контакт:</strong> ".htmlspecialchars($row['contact_info'])."</p>
                <p><em>Дата: ".$row['created_at']."</em></p>
              </div><hr>";
    }
    $result->free();
} else {
    echo "<p>Заявок пока нет.</p>";
}
?>
<?php include 'includes/footer.php'; ?>
