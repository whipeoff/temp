<?php
require_once 'db.php';

function getRegions() {
    global $conn;
    $regions = [];
    $sql = "SELECT * FROM regions ORDER BY name";
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $regions[] = $row;
        }
        $result->free();
    }
    return $regions;
}

function getCitiesByRegion($region_id) {
    global $conn;
    $cities = [];
    $stmt = $conn->prepare("SELECT * FROM cities WHERE region_id = ? ORDER BY name");
    $stmt->bind_param("i", $region_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $cities[] = $row;
    }
    $stmt->close();
    return $cities;
}

function addCity($region_id, $city_name, $population) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO cities (region_id, name, population) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $region_id, $city_name, $population);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function getCityById($city_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM cities WHERE id = ?");
    $stmt->bind_param("i", $city_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $city = $result->fetch_assoc();
    $stmt->close();
    return $city ? $city : null;
}

function updateCity($city_id, $new_city_name, $new_population) {
    global $conn;
    $stmt = $conn->prepare("UPDATE cities SET name = ?, population = ? WHERE id = ?");
    $stmt->bind_param("sii", $new_city_name, $new_population, $city_id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function deleteCity($city_id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM cities WHERE id = ?");
    $stmt->bind_param("i", $city_id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
?>
