<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
</head>
<body>

<h2>Гостевая книга</h2>

<?php

$file = 'data.txt';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {

        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $date = date("Y-m-d H:i:s");

        //Не придумал как лучше записывать сообщение в файл в 1 строку
        $encoded_message = base64_encode($message);

        $new_entry = "$name|$email|$date|$encoded_message\n";

        file_put_contents($file, $new_entry, FILE_APPEND | LOCK_EX);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "<p style='color:red;'>Не все поля были заполнены</p>";
    }
}
?>

<form method="POST" action="">
    <label for="name">Имя:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="message">Сообщение:</label><br>
    <textarea id="message" name="message" rows="5" required></textarea><br><br>

    <input type="submit" value="Отправить">
</form>

<hr>

<h3>Сообщения:</h3>

<?php
if (file_exists($file)) {
    $entries = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $entries = array_reverse($entries);

    foreach ($entries as $entry) {

        list($name, $email, $date, $encoded_message) = explode('|', $entry);

        $message = base64_decode($encoded_message);

        $message = nl2br($message);

        echo "<div style='border:1px solid #ccc; padding:10px; margin-bottom:10px;'>";
        echo "<strong>$name</strong> ($email) <em>[$date]</em><br>";
        echo "<p>$message</p>";
        echo "</div>";
    }
} else {
    echo "<p>Сообщений пока нет.</p>";
}
?>

</body>
</html>