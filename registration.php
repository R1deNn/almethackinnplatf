<?php include 'header.php';
if(isset($_POST['reg'])){
    //Нет ли в БД пользователя
    $query = mysqli_query($link, 'SELECT * FROM users WHERE login = "'.$_POST['login'].'"');
    $data = mysqli_fetch_assoc($query);
    $query2 = mysqli_query($link, 'SELECT * FROM users WHERE email = "'.$_POST['email'].'"');
    $data2 = mysqli_fetch_assoc($query2);
    //Если нет, то добавляем

    if($data2['email']!=''){
        $msg= "Пользователь с такой почтой уже зарегистрирован!";
    }else{
        if($data['login']==''){

                $password=$_POST['password'];
                $reg=mysqli_query($link, 'INSERT INTO users(first_name, name, last_name, login, password,  email) 
VALUES ("' . $_POST['first_name'] . '","' . $_POST['name'] . '","' . $_POST['last_name'] . '","' . $_POST['login'] . '","' . $password. '","' . $_POST['email'] . '")');
                $msg= "Регистрация прошла успешно!";
            //Иначе ошибку выводим
        }else{$msg= "Пользователь с таким логином уже зарегистрирован!";
        }}}


//Если нет, то добавляем

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация - Әфишка</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body class="login">

    <div class="regmain">
        <form method="post" enctype="multipart/form-data" id="cform" name="cform">
            <h2>Регистрация</h2>
            <p>ваше имя</p>
            <input type="text" name="name" name="name" required pattern="[а-яА-ЯёЁ\s]+">
            <p>ваша фамилия</p>
            <input type="text" name="name" name="last_name" required pattern="[а-яА-ЯёЁ\s]+">
            <p>ваше отчество</p>
            <input type="text" name="name" name="first_name" required pattern="[а-яА-ЯёЁ\s]+">
            <p>ваш номер телефона</p>
            <input type="text" name="phone" name="first_name" required maxlength="12">
            <p>электронная почта</p>
            <input type="email" name="email" id="email" required><br>
            <p>фото профиля</p>
            <input name="image" id="image" size="1" type="file" required><br>
            <p>логин</p>
            <input type="text" name="login" id="image" required><br>
            <p>пароль</p>
            <input type="password" name="password" title="пароль должен состоять минимум из 6 символов, содержать по крайней мере одну цифру и одну заглавную букву" maxlength="100" pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' id="password"><br>
            <input type="checkbox" name="agree" id="agree" class="lastcb"><label>Я согласен с условиями обработки персональных данных</label>
            <input type="submit" name="reg" class="button button-green large" value="Зарегистрироваться"> <a href="login.php" class="button button-blue large">Войти</a>
            <h2 style="color: white; text-align: center; margin-top: 30px;"><?php echo $msg; ?></h2>
        </form>
    </div>
</body>
</html>