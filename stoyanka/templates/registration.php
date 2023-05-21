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
  <?php $classname = isset($errors) ? "form--invalid" : ""; ?>
<form class="form container <?= $classname; ?>" action="sign-up.php" method="post" autocomplete="off" enctype="multipart/form-data">
      <h2>Регистрация</h2>
      <?php $values = [
    'name' => '',
    'email' => '',
    'password' => ''
];?>
      <?php $classname = isset($errors["name"]) ? "form__item--invalid" : ""; ?>
      <div class="form-item <?= $classname; ?>">
        <input id="name" type="text" name="name" placeholder="Ваше имя" value="<?= $values['name'];?>"><br>
        <span class="form-error"><?= $errors["name"]; ?></span>
      </div>
      <div class="form-item <?= $classname; ?>"> 
      <?php $classname = isset($errors["email"]) ? "form__item--invalid" : ""; ?>
        <input id="email" type="text" name="email" placeholder="Ваш e-mail" value="<?= $values['email'] ;?>"><br>
        <span class="form-error"><?= $errors["email"]; ?></span>
      </div>
      <?php $classname = isset($errors["password"]) ? "form__item--invalid" : ""; ?>
      <div class="form-item <?= $classname; ?>">
        <input id="password" type="password" name="password" placeholder="Ваш пароль" value="<?= $values['password'] ;?>"><br>
        <span class="form-error"><?= $errors["password"]; ?></span>
      </div>
      <span class="form-error form-error-bottom">Пожалуйста, исправьте ошибки в форме.</span>
      <button type="submit" class="button">Зарегистрироваться</button>
      <a class="text-link" href="login.php">Уже есть аккаунт?  Войти</a>
    </form>
</section>
  </main>
  <footer>
  <?php require('footer.php'); ?>
  </footer>
</body>
</html> 