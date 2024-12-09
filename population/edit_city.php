<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_city'])) {
    $city_id = intval($_POST['city_id']);
    $new_city_name = trim($_POST['new_city_name']);
    $new_population = intval($_POST['new_population']);

    if (!empty($new_city_name) && $new_population > 0) {
        if (updateCity($city_id, $new_city_name, $new_population)) {
            header("Location: index.php?message=city_updated");
            exit();
        } else {
            header("Location: index.php?message=error_update");
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
