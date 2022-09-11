<?php include 'header.php'; 
include 'calendar.php';
$calendar = new Calendar('2022-09-01');
$calendar->add_event('Алексей Глызин', '2022-09-24');
$calendar->add_event('Экспозиция интерактивного
центра «Альметрика»', '2022-09-24');
$calendar->add_event('Выставка музыкальных
инструментов', '2022-09-24');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>календарь - Әфишка</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <?php
        echo $calendar;
    ?>
</body>
</html>