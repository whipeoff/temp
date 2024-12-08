<?php
if(!isset($page_title)) $page_title = "Ремонт сотовых телефонов - Сервис";
if(!isset($page_description)) $page_description = "Профессиональный ремонт телефонов. Быстрая диагностика, оригинальные запчасти, гарантия.";

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="description" content="<?php echo htmlspecialchars($page_description, ENT_QUOTES); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo htmlspecialchars($page_title, ENT_QUOTES); ?></title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<header>
  <div class="container">
    <a href="index.php"><img src="img/logo.png" alt="Лого" class="logo"></a>
    <nav>
      <ul>
        <li><a href="index.php">Главная</a></li>
        <li><a href="specialists.php">Специалисты</a></li>
        <li><a href="about.php">О сервисе</a></li>
        <li><a href="request.php">Заявка на ремонт</a></li>
        <li><a href="contacts.php">Контакты</a></li>
      </ul>
    </nav>
  </div>
</header>
<main class="container">
