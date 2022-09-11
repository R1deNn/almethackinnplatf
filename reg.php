<?php include 'header.php';
if (isset($_POST['reg'])) {
   //Нет ли в БД пользователя
   $query = mysqli_query($link, 'SELECT * FROM users WHERE login = "' . $_POST['login'] . '"');
   $data = mysqli_fetch_assoc($query);
   $query2 = mysqli_query($link, 'SELECT * FROM users WHERE email = "' . $_POST['email'] . '"');
   $data2 = mysqli_fetch_assoc($query2);
   //Если нет, то добавляем

   if ($data2['email'] != '') {
      $msg = "Пользователь с такой почтой уже зарегистрирован!";
   } else {
      if ($data['login'] == '') {

         $password = $_POST['password'];
         $reg = mysqli_query($link, 'INSERT INTO users(first_name, name, last_name, login, password,  email) 
VALUES ("' . $_POST['first_name'] . '","' . $_POST['name'] . '","' . $_POST['last_name'] . '","' . $_POST['login'] . '","' . $password . '","' . $_POST['email'] . '")');
         $msg = "Регистрация прошла успешно!";
         //Иначе ошибку выводим
      } else {
         $msg = "Пользователь с таким логином уже зарегистрирован!";
      }
   }
}


//Если нет, то добавляем

?>

<div class="block2">

   <div class="container_12">

      <!--==============================content================================-->

      <section class="content">

         <div class="wrapper">

            <article class="grid_12 last-col">

               <div class="hello_box" style="text-align: center">Регистрация </div>

            </article>

         </div>

         <div class="wrapper projects">


            <div class="row clearfix">

               <article class="grid_12">

                  <h2><?php echo $msg; ?></h2>



                  <form method="post" enctype='multipart/form-data' id="cform" name="cform">

                     <label>Фамилия:<span class="required">*</span></label>

                     <input title='Только кириллица без цифр и знаков препинания!' maxlength="100" pattern="[а-яА-ЯёЁ\s]+" name="first_name" type="text" required>

                     <label>Имя:<span class="required">*</span></label>

                     <input title='Только кириллица без цифр и знаков препинания!' maxlength="100" pattern="[а-яА-ЯёЁ\s]+" name="name" type="text" required>

                     <label>Отчество:<span class="required">*</span></label>

                     <input title='Только кириллица без цифр и знаков препинания!' maxlength="100" pattern="[а-яА-ЯёЁ\s]+" name="last_name" type="text" required>

                     <label>Телефон:<span class="required">*</span></label>

                     <input name="phone" maxlength="12" type="text" required>
                     <label>Адрес:<span class="required">*</span></label>

                     <input name="address" type="text" required>
                     <label>Email:<span class="required">*</span></label>

                     <input name="email" type="email" required>
                     <label>Фото:<span class="required">*</span></label>
                     <input name="image" size="1" type="file" accept=".jpg" required>

                     <label>Логин:<span class="required">*</span></label>

                     <input name="login" type="text" required>


                     <label>Пароль:<span class="required">*</span></label>

                     <input name="password" maxlength="100" title='Пароль должен состоять минимум из 6 символов и содержать хотя бы одну цифру и один символ нижнего и верхнего регистра' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' type="password" required>

                     <center> <input type="submit" name="reg" class="button button-green large" value="Зарегистрироваться"> <a href="login.php" class="button button-blue large">Войти</a> </center>

                     <div id="output" class="contactpage-msg"></div>


                  </form>

               </article>

            </div>

         </div>

      </section>

   </div>

</div>

<div class="hireus_block offices">

   <div class="container_12">

      <section class="">

         <div class="wrapper">

            <h2>Контакты</h2>

            <article class="grid_3"> <b>Email </b>

               <p>admin@mail.ru</p>

            </article>

            <article class="grid_3"> <b>Телефон</b>

               <p>+7-900-000-00-00</p>

            </article>

            <article class="grid_3"> <b>Адрес </b>

               <p>г.Альметьевск, ул.Мира 10</p>

            </article>



         </div>

      </section>

   </div>

</div>

<?php include 'footer.php'; ?>