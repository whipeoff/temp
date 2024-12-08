<?php
$page_title = "Админ - Вход";
$page_description = "Страница входа администратора.";
include 'includes/header.php';
?>
<h2>Вход для администратора</h2>
<form action="admin_login_process.php" method="post">
    <div>
        <label>Логин:</label>
        <input type="text" name="username" required>
    </div>
    <div>
        <label>Пароль:</label>
        <input type="password" name="password" required>
    </div>
    <button type="submit">Войти</button>
</form>
<?php include 'includes/footer.php'; ?>
