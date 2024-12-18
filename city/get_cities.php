<?php

header('Content-Type: application/json');

if(!isset($_POST['region_id']) || empty($_POST['region_id'])){
    echo json_encode(['status' => 'error', 'message' => 'Не указан регион.']);
    exit;
}

$region_id = intval($_POST['region_id']);

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "location_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Ошибка подключения к базе данных.']);
    exit;
}

$stmt = $conn->prepare("SELECT id, name FROM cities WHERE region_id = ? ORDER BY name");
$stmt->bind_param("i", $region_id);
$stmt->execute();
$result = $stmt->get_result();

$cities = [];
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $cities[] = $row;
    }
}

$stmt->close();
$conn->close();

if(count($cities) > 0){
    echo json_encode(['status' => 'success', 'data' => $cities]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Города не найдены.']);
}
?>
