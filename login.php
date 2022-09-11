<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход - Әфишка</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body class="login">

    <div class="loginmain">
        <form method="post" id="cform" name="cform">
            <h2>Авторизация</h2>
            <p>логин</p>
            <input type="text" name="login" id="email" required>
            <p>пароль</p>
            <input type="password" name="password" id="password" required><br>
            <input type="submit" name="auth" id="" value="войти">
            <a href="recover.php">восстановить доступ</a>
            <h2><?php echo $msg; ?></h2>
        </form>
    </div>

    <div class="registrationmain">
            <button><a href='./registration.php'>зарегистрироваться</a></button>
            <p>после регистрации вы получите доступ ко всем возможностям Әфишки</p>

    </div>
</body>
</html>