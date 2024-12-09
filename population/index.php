<?php
require_once 'functions.php';

$message = '';
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 'city_added':
            $message = "<div class='message success'>Город успешно добавлен.</div>";
            break;
        case 'city_updated':
            $message = "<div class='message success'>Данные города успешно обновлены.</div>";
            break;
        case 'city_deleted':
            $message = "<div class='message success'>Город успешно удален.</div>";
            break;
        case 'error_add':
            $message = "<div class='message error'>Ошибка при добавлении города.</div>";
            break;
        case 'error_update':
            $message = "<div class='message error'>Ошибка при обновлении данных города.</div>";
            break;
        case 'error_delete':
            $message = "<div class='message error'>Ошибка при удалении города.</div>";
            break;
        case 'invalid_input':
            $message = "<div class='message error'>Пожалуйста, заполните все поля корректно.</div>";
            break;
        case 'city_not_found':
            $message = "<div class='message error'>Город не найден.</div>";
            break;
        default:
            $message = '';
    }
}

$regions = getRegions();

$edit_city = null;
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit'])) {
    $edit_id = intval($_GET['edit']);
    $edit_city = getCityById($edit_id);
    if (!$edit_city) {
        $message = "<div class='message error'>Город не найден.</div>";
    }
}
?>

<?php include 'header.php'; ?>

<?php
echo $message;
?>

<div class="add-form">
    <h2>Добавить Новый Город</h2>
    <form method="POST" action="add_city.php">
        <label for="region">Регион:</label>
        <select name="region" id="region" required>
            <option value="" disabled selected>-- Выберите регион --</option>
            <?php foreach ($regions as $region): ?>
                <option value="<?= htmlspecialchars($region['id']) ?>"><?= htmlspecialchars($region['name']) ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="city_name">Город:</label>
        <input type="text" name="city_name" id="city_name" required>
        <br>
        <label for="population">Население:</label>
        <input type="number" name="population" id="population" min="1" required>
        <br>
        <button type="submit" name="add_city">Добавить Город</button>
    </form>
</div>

<?php if ($edit_city): ?>
    <div class="edit-form">
        <h2>Редактировать Город: <?= htmlspecialchars($edit_city['name']) ?></h2>
        <form method="POST" action="edit_city.php">
            <input type="hidden" name="city_id" value="<?= $edit_city['id'] ?>">
            <label for="new_city_name">Город:</label>
            <input type="text" name="new_city_name" id="new_city_name" value="<?= htmlspecialchars($edit_city['name']) ?>" required>
            <br>
            <label for="new_population">Население:</label>
            <input type="number" name="new_population" id="new_population" value="<?= htmlspecialchars($edit_city['population']) ?>" min="1" required>
            <br>
            <button type="submit" name="edit_city">Сохранить Изменения</button>
            <a href="index.php"><button type="button">Отмена</button></a>
        </form>
    </div>
<?php endif; ?>

<div class="clear"></div>

<h2>Список Регионов и Города</h2>

<?php foreach ($regions as $region): ?>
    <table>
        <caption><strong><?= htmlspecialchars($region['name']) ?></strong></caption>
        <tr>
            <th>Город</th>
            <th>Население</th>
            <th>Действия</th>
        </tr>
        <?php
        $cities = getCitiesByRegion($region['id']);
        if (count($cities) > 0):
            foreach ($cities as $city):
        ?>
        <tr>
            <td><?= htmlspecialchars($city['name']) ?></td>
            <td><?= number_format($city['population'], 0, ',', ' ') ?></td>
            <td>
                <a href="index.php?edit=<?= $city['id'] ?>"><button type="button">Редактировать</button></a>
                <form method="POST" action="delete_city.php" style="display:inline;" onsubmit="return confirm('Вы уверены, что хотите удалить этот город?');">
                    <input type="hidden" name="city_id" value="<?= $city['id'] ?>">
                    <button type="submit" name="delete_city">Удалить</button>
                </form>
            </td>
        </tr>
        <?php
            endforeach;
        else:
        ?>
        <tr>
            <td colspan="3">Нет городов в этом регионе.</td>
        </tr>
        <?php endif; ?>
    </table>
<?php endforeach; ?>

<div class="clear"></div>

<?php include 'footer.php'; ?>
