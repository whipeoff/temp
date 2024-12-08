<?php
require 'includes/db.php';

$full_name = $_POST['full_name'] ?? '';
$phone_model = $_POST['phone_model'] ?? '';
$repair_description = $_POST['repair_description'] ?? '';
$contact_info = $_POST['contact_info'] ?? '';

if($full_name && $phone_model && $contact_info){
    $stmt = $mysqli->prepare("INSERT INTO requests (full_name, phone_model, repair_description, contact_info) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $full_name, $phone_model, $repair_description, $contact_info);
    $stmt->execute();
    $stmt->close();
    echo "Заявка успешно отправлена!";
} else {
    echo "Пожалуйста, заполните обязательные поля.";
}
