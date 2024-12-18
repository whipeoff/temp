<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "location_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$sql = "SELECT id, name FROM regions ORDER BY name";
$result = $conn->query($sql);

$regions = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $regions[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

    <h1>Выберите регион и город</h1>

    <label for="region">Регион:</label>
    <select id="region" name="region">
        <option value="0">-выберите регион-</option>
        <?php foreach($regions as $region): ?>
            <option value="<?php echo htmlspecialchars($region['id']); ?>">
                <?php echo htmlspecialchars($region['name']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <div id="city-container" class="hidden">
        <label for="city">Город:</label>
        <select id="city" name="city">
            <option value="0">-выберите город-</option>
        </select>
    </div>

    <script>
    $(document).ready(function(){
        $('#region').change(function(){
            var region_id = $(this).val();
            if(region_id == 0){
                $('#city-container').hide();
                $('#city').html('<option value="0">-выберите город-</option>');
            } else {
                $.ajax({
                    url: 'get_cities.php',
                    type: 'POST',
                    data: {region_id: region_id},
                    dataType: 'json',
                    success: function(response){
                        if(response.status == 'success'){
                            var options = '<option value="0">-выберите город-</option>';
                            $.each(response.data, function(index, city){
                                options += '<option value="'+ city.id +'">'+ city.name +'</option>';
                            });
                            $('#city').html(options);
                            $('#city-container').show();
                        } else {
                            alert('Города не найдены.');
                            $('#city-container').hide();
                        }
                    },
                    error: function(){
                        alert('Произошла ошибка при загрузке городов.');
                        $('#city-container').hide();
                    }
                });
            }
        });
    });
    </script>

</body>
</html>
