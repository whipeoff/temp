<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вычисление разницы между датами</title>
</head>
<body>

<h2>Введите две даты</h2>

<?php
$date1 = isset($_POST['date1']) ? $_POST['date1'] : '';
$date2 = isset($_POST['date2']) ? $_POST['date2'] : '';
$daysDifference = '';
$minutesDifference = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($date1) && !empty($date2)) {
    $startDate = new DateTime($date1);
    $endDate = new DateTime($date2);

    $interval = $startDate->diff($endDate);

    $daysDifference = $interval->days;

    $minutesDifference = $daysDifference * 24 * 60;
}
?>

<!-- form for dates -->
<form method="POST" action="">
    <label for="date1">Дата 1:</label>
    <input type="date" id="date1" name="date1" value="<?php echo $date1 ?>" required><br><br>

    <label for="date2">Дата 2:</label>
    <input type="date" id="date2" name="date2" value="<?php echo $date2 ?>" required><br><br>

    <input type="submit" value="Вычислить">
</form>

<?php
if (!empty($daysDifference)) {
    echo "<h3>Результаты:</h3>";
    echo "<p>Количество дней между датами: $daysDifference</p>";
    echo "<p>Количество минут между датами: $minutesDifference</p>";
}
?>

</body>
</html>