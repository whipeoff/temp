<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_city'])) {
    $region_id = intval($_POST['region']);
    $city_name = trim($_POST['city_name']);
    $population = intval($_POST['population']);

    if (!empty($city_name) && $population > 0) {
        if (addCity($region_id, $city_name, $population)) {
            header("Location: index.php?message=city_added");
            exit();
        } else {
            header("Location: index.php?message=error_add");
            exit();
        }
    } else {
        header("Location: index.php?message=invalid_input");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
