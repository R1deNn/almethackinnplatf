<?php
    include 'header.php';
    if (isset($_POST['update'])) {
        mysqli_query($link, 'UPDATE users SET '
            . 'first_name="' . $_POST['first_name'] . '",'
            . 'name="' . $_POST['name'] . '",'
            . 'last_name="' . $_POST['last_name'] . '",'
            . 'email="' . $_POST['email'] . '",'
            . 'login="' . $_POST['login'] . '",'
            . 'password="' . $_POST['password'] . '"'
            . 'WHERE `id`=' . $_SESSION['id']);
        $msg="<p class='message success'>Данные успешно изменены!</p>";
    }
    $us=$_SESSION['id'];
    if(isset($_POST['update_photo'])){
    
        if (isset($_FILES['image'])) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    
            $uploaddir = 'img/';
            $uploadfile = $uploaddir . 'photo_' . $us . '.' . $ext;
            $img = 'photo_' . $us . '.' . $ext;
            if (isset($_FILES['image']['tmp_name'])) {
                copy($_FILES['image']['tmp_name'], $uploadfile);
            }
        }
    
    
        mysqli_query($link, "UPDATE users SET photo = '$img' WHERE `id`='$us'");
        $msg="<p class='message success'>Фотография профиля успешно изменена!</p>";
    }
    $vib1=mysqli_query($link, "SELECT * FROM users WHERE id='$us'");
    while($data = mysqli_fetch_assoc($vib1)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет - Әфишка</title>
</head>
<body>
<div class="block2">

<div class="container_12">



    <section class="content">

        <div class="wrapper">


        </div>


        <div class="wrapper projects">


            <div class="row clearfix">

                <article class="grid_12">

                    <h2><?php echo $msg; ?></h2>



                    <form method="post" enctype='multipart/form-data' id="cform" name="cform"  class="cabinetform">

                        <div class="offer">

                            <div class="title">Фотография пользователя</div>
                            <img width="20%" src="img/<?php echo $data['photo']; ?>">
                            <input name="image" size="1" type="file" required>

                            <center> <input type="submit" name="update_photo" class="button button-green large" value="Сохранить фото"></center>


                        </div>


                        <div id="output" class="contactpage-msg"></div>


                    </form>

                </article>

            </div>

        </div>
        <div class="wrapper projects">


            <div class="row clearfix">

                <article class="grid_12">




                    <form method="post" id="cform" name="cform" class="cabinetform">

                        <label>Фамилия:<span class="required">*</span></label>

                        <input value="<?php echo $data['first_name']; ?>" title='Только кириллица без цифр и знаков препинания!' maxlength="100" pattern="[а-яА-ЯёЁ\s]+" name="first_name" type="text" required>

                        <label>Имя:<span class="required">*</span></label>

                        <input value="<?php echo $data['name']; ?>" title='Только кириллица без цифр и знаков препинания!' maxlength="100" pattern="[а-яА-ЯёЁ\s]+" name="name" type="text" required>

                        <label>Отчество:<span class="required">*</span></label>

                        <input value="<?php echo $data['last_name']; ?>" title='Только кириллица без цифр и знаков препинания!' maxlength="100" pattern="[а-яА-ЯёЁ\s]+" name="last_name" type="text" required>

                        <label>Email:<span class="required">*</span></label>

                        <input value="<?php echo $data['email']; ?>" name="email" type="email" required>

                        <label>Логин:<span class="required">*</span></label>

                        <input value="<?php echo $data['login']; ?>" name="login" type="text" required>


                        <label>Пароль:<span class="required">*</span></label>

                        <input value="<?php echo $data['password']; ?>" name="password" maxlength="100" title='Пароль должен состоять минимум из 6 символов и содержать хотя бы одну цифру и один символ нижнего и верхнего регистра' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' type="password" required>

                        <center> <input type="submit" name="update" class="button button-green large savebtn" value="Сохранить"> </center>

                        <div id="output" class="contactpage-msg"></div>


                    </form>

                </article>

            </div>

        </div>

    </section>

</div>

</div>
<?php } 
include 'footer.php';
?>
</body>
</html>