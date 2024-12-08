<?php
$page_title = "Специалисты - Наш сервис";
$page_description = "Наши специалисты - квалифицированные мастера с большим опытом ремонта смартфонов разных марок.";
include 'includes/header.php';
require 'includes/db.php';
?>
<h2>Наши специалисты</h2>
<p>Все наши инженеры имеют многолетний опыт и регулярно проходят дополнительное обучение.</p>
<?php
$result = $mysqli->query("SELECT * FROM specialists");
if($result && $result->num_rows > 0) {
    while($spec = $result->fetch_assoc()){
        echo "<div class='specialist'>
                <img src='img/".htmlspecialchars($spec['photo'])."' alt='Специалист'>
                <h3>".htmlspecialchars($spec['name'])."</h3>
                <p>".htmlspecialchars($spec['specialty'])."</p>
                <p>".htmlspecialchars($spec['description'])."</p>
              </div>";
    }
    $result->free();
} else {
    echo "<p>Информация о специалистах отсутствует.</p>";
}
?>
<?php include 'includes/footer.php'; ?>
