<header class="main-header">
<? require_once("data.php"); ?>
        <nav class ="main-nav">
            <a class = "logo" href = "http://localhost/stoyanka/layout.php"><img src = "img/logo.png" width = "160" height = "50" alt = "Логотип сети отелей Стоянка"></a>
            <ul class = "hotels"><li class = "hotels-list">Наши отели</li>
            <ul class = "cities">
                <li class= "city"><a href= "kazan.php">Казань</a></li>
                <li class= "city"><a href= "muenchen.php">Мюнхен</a></li>
                <li class= "city"><a href= "dubai.php">Дубай</a></li></ul>
            </ul>
            <ul class = "contacts">
                <li class="email"><img src = "img/letter.svg"  width = "37" height = "26" alt = "Иконка письма"><a href = "mailto:Stoyanka@info.ru">Stoyanka@info.ru</a></li>
                <li class="phone"><img src = "img/phone.png"  width = "30" height = "30" alt = "Иконка телефонной трубки"><a href="tel:+79999999999">+7 (999)999-99-99</a></li></ul>
                <?php if ($is_auth): ?>
                    <img src = "img/icon.svg" class = "user-icon" width = "50" height = "50" alt = "Аватар пользователя">
                <ul class= "user-menus">
                    <li><a class= "user-menu" href = "settings.php">Настройки</a></li>
                    <li><a class="user-menu user-menu__logout" href="logout.php">Выход</a></li></ul>
                    <?php else: ?>
                <a class="icon" href = "layout.php"><img src = "img/icon.svg" width = "50" height = "50" alt = "Аватар пользователя"></a>
                <?php endif; ?>
  </header>
