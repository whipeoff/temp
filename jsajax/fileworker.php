<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $age = htmlspecialchars($_POST['age'], ENT_QUOTES, 'UTF-8');
        $speciality = htmlspecialchars($_POST['speciality'], ENT_QUOTES, 'UTF-8');
        $experience = htmlspecialchars($_POST['experience'], ENT_QUOTES, 'UTF-8');

        $file = fopen("data.txt", "a");
        fwrite($file, "$name,$email,$age,$speciality,$experience\n");
        fclose($file);

        $response = [
            'status' => 'success',
            'message' => 'Данные успешно сохранены'
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $file = 'data.txt';
        $data = [];

        if (file_exists($file)) {
            $fileContent = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($fileContent as $line) {
                $data[] = explode(",", $line);
            }
        }
        
        header('Content-Type: application/json');
        echo json_encode($data);
    }
?>
