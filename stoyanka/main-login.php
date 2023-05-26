<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
<link href="css/header.css" rel="stylesheet">
<link href="css/regis.css" rel="stylesheet">
<link href="css/footer.css" rel="stylesheet">
    <title>Сеть отелей Стоянка</title>
</head>
<body>
  <div class="container">
  <?php
 require('header.php'); ?>
  <main class="container">
  <section class= "registration">
<form class="form container" action="login.php" method="post" autocomplete="off" enctype="multipart/form-data">
    
      <h2>Авторизация</h2>
      <?php $values = [
    'name' => '',
    'email' => '',
    'password' => ''];
      ?>
      <div class="form-item"> 
        <input id="email" type="text" name="email" placeholder="Ваш e-mail" value="<?= $values['email'] ;?>"><br>
        <span class="form-error"><?php if (isset($errors['email']))  {print_r($errors['email']); } ?></span> 
      </div>
      <div class="form-item">
        <input id="password" type="password" name="password" placeholder="Ваш пароль" value="<?= $values['password'] ;?>"><br>
        <span class="form-error"><?php if (isset($errors['password']))  {print_r($errors['password']); } ?></span> 
      </div>
      <?php if (isset($errors)): ?><span class="form-error form-error-bottom">Пожалуйста, исправьте ошибки в форме.</span>   <?php endif; ?>
      <button type="submit" class="button">Войти</button>
      <a class= "exit" href="sign-up.php">Назад</a>
    </form>
    
</section>
  </main>
  <footer>
  <?php require('footer.php'); ?>
  </footer>
</body>
</html> 