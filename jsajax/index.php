<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form input {
            display: block;       
            margin-bottom: 10px;  
            width: 20%;         
        }

        .error {
            color: red;
            display: block;       
            margin-bottom: 10px;     
        }

        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Форма добавления данных</h2>

    <form id="dataForm">

        <label for="name">Имя:</label>
        <input type="text" required id="name" name="name">

        <label for="email">Почта:</label>
        <input type="text" required id="email" name="email">
        <div id="emailError" class="error"></div>

        <label for="age">Возраст:</label>
        <input type="number" required id="age" name="age">
        <div id="ageError" class="error"></div>

        <label for="speciality">Специальность:</label>
        <input type="text" required id="speciality" name="speciality">

        <label for="experience">Опыт:</label>
        <input type="number" required id="experience" name="experience">
        

        <button type="submit">Отправить</button>
    </form>

    <h2>Данные</h2>
    <table id="dataTable">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Почта</th>
                <th>Возраст</th>
                <th>Специальность</th>
                <th>Опыт</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <script>
        $(document).ready(function() {

            function loadData() {
                $.ajax({
                    url: 'fileworker.php',  
                    type: 'GET',
                    success: function(data) {
                        if (Array.isArray(data) && data.length > 0) {
                            $('#dataTable tbody').empty(); 

                            data.forEach(function(row) {
                                var rowHtml = '<tr>';
                                row.forEach(function(cell) {
                                    rowHtml += '<td>' + cell + '</td>';
                                });
                                rowHtml += '</tr>';

                                $('#dataTable tbody').append(rowHtml);
                            });
                        } else {
                            alert('Данные не найдены');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Ошибка при загрузке данных');
                    }
                });
            }

            loadData();

            $('#dataForm').submit(function(e) {
                e.preventDefault();  

                $('.error').text('');
                let isValid = true;

                let email = $('#email').val();
                let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                if (!emailRegex.test(email)) {
                    $('#emailError').text('Почта введена некорректно.');
                    isValid = false;
                }

                let age = $('#age').val();
                if (isNaN(age) || age < 30) {
                    $('#ageError').text('Молодой ты еще, не шаришь. 30+');
                    isValid = false;
                }

                if (!isValid) {
                    return;
                }

                $.ajax({
                    url: 'fileworker.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(data) {
                        console.log(data);
                        if (data.status === 'success') {
                            loadData();  
                        }
                    }
                });
            });
        });
    </script>

</body>
</html>
