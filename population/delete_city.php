<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_city'])) {
    $city_id = intval($_POST['city_id']);
    $city = getCityById($city_id);
    if ($city) {
        if (deleteCity($city_id)) {
            header("Location: index.php?message=city_deleted");
            exit();
        } else {
            header("Location: index.php?message=error_delete");
            exit();
        }
    } else {
        header("Location: index.php?message=city_not_found");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
