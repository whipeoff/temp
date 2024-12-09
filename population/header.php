<?php
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Управление Населением Городов</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 45%;
            border-collapse: collapse;
            margin: 20px;
            float: left;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        .clear {
            clear: both;
        }
        .edit-form, .add-form {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            width: 50%;
        }
        label {
            display: inline-block;
            width: 120px;
            vertical-align: top;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }
        button {
            padding: 5px 10px;
            margin-top: 5px;
        }
        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 4px;
        }
        .message.success {
            background-color: #e0f7e9;
            color: #2e7d32;
            border: 1px solid #2e7d32;
        }
        .message.error {
            background-color: #ffebee;
            color: #c62828;
            border: 1px solid #c62828;
        }
    </style>
</head>
<body>
    <h1>Управление Населением Городов</h1>
