<?php
$page_title = "Заявка на ремонт - Сервис";
$page_description = "Оставьте заявку на ремонт телефона. Мы свяжемся с вами и уточним детали.";
include 'includes/header.php';
?>
<h2>Заявка на ремонт</h2>
<p>Заполните форму, и мы вскоре свяжемся с вами.</p>

<form action="submit_request.php" method="post">
    <div>
        <label>ФИО:</label>
        <input type="text" name="full_name" required>
    </div>
    <div>
        <label>Модель телефона:</label>
        <input type="text" name="phone_model" required>
    </div>
    <div>
        <label>Описание проблемы:</label>
        <textarea name="repair_description"></textarea>
    </div>
    <div>
        <label>Контактная информация:</label>
        <input type="text" name="contact_info" required>
    </div>
    <button type="submit">Отправить заявку</button>
</form>

<?php include 'includes/footer.php'; ?>
