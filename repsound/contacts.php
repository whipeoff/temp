<?php include 'header.php'; ?>

<h2>Контакты</h2>
<p>Если у вас есть вопросы или предложения, свяжитесь с нами любым удобным для вас способом.</p>

<div class="row">
  <div class="col-md-6">
    <h3>Адрес</h3>
    <p>г. Москва, ул. Музыкальная, д. 10</p>
    <h3>Телефон</h3>
    <p>+7 (495) 123-45-67</p>
    <h3>Email</h3>
    <p>info@repairmusic.ru</p>
  </div>
  <div class="col-md-6">
    <h3>Форма обратной связи</h3>
    <form action="send_message.php" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Имя</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Эл. почта</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Сообщение</label>
        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
  </div>
</div>

<?php include 'footer.php'; ?>
