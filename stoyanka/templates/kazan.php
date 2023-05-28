<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap"
              rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Inter&display=swap"
              rel="stylesheet" />
              <link href="css/header.css" rel="stylesheet">
        <link href="css/hotel-page1.css" rel="stylesheet" />
        <link href="css/footer.css" rel="stylesheet">
        <title>Stoyanka</title>
    </head>
    <body>
    <?php
    require_once("functions.php");
    require_once("data.php");
    require_once("init.php");
 require('header.php'); ?>
 <section class = "content">
        <div class="page">
        <img class="building" src = "img/kzn.png" width = '308' height = '479'>
            <div class="info">
             <span class="bold">Стоянка: </span>Казань, Россия</br> 
             <span class="bold">Адрес: </span>ул. Чернышевского, 21  </br>
             <span class="bold">Рейтинг: </span>5 звёзд</br>
             <p class="description">Этот современный отель расположен недалеко от центра города с магазинами и ресторанами, в 14 минутах ходьбы от Казанского кремля и в 15 минутах ходьбы от башни Сююмбике. Парковка бесплатна. В современном ресторане подают блюда интернациональной и местной кухонь. 
</p>
</div></div>
<div class="map-n-shi">
             <img class="map_munch" src = "img/map_kzn.png" width = '305' height = '299'>
             <div class="comment-feed container">
          <h2>Отзывы:</h2>
          <ul class="comment-list">
          <?php foreach($comments as $comment):?>
            <li class="user-comment">
            <div class = "user-data"><div class="circle_1"></div><span class="user"><?=$comment['user_name'];?></span></div>
            <p class = "comment"><?=$comment['content'];?></p> </li><?php endforeach;?>
</ul>
<?php $values = [
    'content' => ''];
    if ($is_auth) :?>
<form action="" method="post" class="comment-form">
            <div class="comment-inner">
              <label class="comment-label" for="comment-input">Ваш отзыв:</label>
              <input type="text" class="comment-field" placeholder="Отзыв" value="<?=$values['content'];?>"  required id="comment-input">
            </div>
            <button class="button" type="submit">Отправить</button>
            <span class="form-error form-error-bottom"><? $errors['content'];?></span>
          </form>
<?php endif; ?>
  <p class= "warning">Вам нужно авторизоваться, чтобы оставлять комментарии.</p>
        </div>

</section>
        <footer>
  <?php require('footer.php'); ?>
  </footer>
    </body>
</html>