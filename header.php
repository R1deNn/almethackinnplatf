<?php
//Подключение файлов БД и сессии
include 'script/session.php';
include 'script/connect.php';
//Кнопка авторизации
if (isset($_POST['auth'])) {
  //Получаем введенные данные
  $elogin = trim($_POST['login']);
  $epassword = trim($_POST['password']);
  //Ищем совпадение в БД
  $query = mysqli_query($link, 'SELECT * FROM users WHERE login = "' . $_POST['login'] . '" and password = "' . $_POST['password'] . '"');
  $data = mysqli_fetch_assoc($query);
  //Если заблокирован, то выводим сообщение
  if ($data['id_status'] == '1') {
    $msg = "<p class='message warning'>Ваш аккаунт заблокирован администратором!</p>";
  } else {
    //Записываем сессию
    //Запускаем на сайт
    if ($data['password'] == $_POST['password'] and $data['login'] == $_POST['login']) {
      $_SESSION['user'] = $data['login'];
      $_SESSION['role'] = $data['id_role'];
      $_SESSION['id'] = $data['id'];
      echo '<script language="JavaScript"> window.location.href = "index.php" </script>;';
      mysqli_query($link, 'UPDATE users SET '
        . 'ts=NOW()'
        . 'WHERE `id`=' . $data['id']);
    } else {
      //Иначе выводим ошибку
      $msg = "<p class='message error'>Неправильный логин или пароль!</p>";
    }
  }
} else {
  //Если нажата кнопка Выход, то очищаем сессию
  if (isset($_GET['logout']) && $_GET['logout'] == 1 ||  $_GET['del'] == 1) {
    $_SESSION = array();
    //Очищаем сессию, если долго не работали на сайте
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 42000, '/');
    }
    session_destroy();
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Әфишка</title>
  <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
  <div class="wrapper">

    <div class="header">
      <nav>
        <img src="./img/логотип.svg" alt="" width="150px"  class='disimg'>
        <a href="./index.php">главная</a>
        <a href="./calendary.php">календарь</a>
        <a href="./events.php">мероприятия</a>
        <?php if (isset($_SESSION['role']) && ($_SESSION['role']=='1')){ ?>
        <?php }?>
        <?php if (isset($_SESSION['role']) && ($_SESSION['role']=='1')){ ?>
          <a href="users.php">пользователи</a>
          <?php }?>
          <?php if (empty($_SESSION['role'])){ ?>
        <a href="./login.php">вход</a>
        <?php }?>
        <?php if (isset($_SESSION['role'])){ ?>
        <a href="profile.php">личный кабинет</a>
        <a href="index.php?logout=1">выйти</a>
        <?php }?>
      </nav>
    </div>

  </div>
</body>

</html>