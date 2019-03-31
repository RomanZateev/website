<?php
header('Location: index.html');
require_once 'connection.php'; // подключаем скрипт
// подключаемся к серверу
if (isset($_POST['Save']))
{
    $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $patronymic = $_POST['patronymic'];
    $group_id = $_POST['group_id'];
    $student_id = (int)$_POST['student_id'];
    #$mysql_update = "UPDATE Students SET Имя=$name, Фамилия=$last_name, Отчество=$patronymic, ID_группы=$group_id WHERE Students.ID_студента=$student_id";
    $mysql_update = "UPDATE Students SET Имя='$name', Фамилия='$last_name', Отчество='$patronymic', ID_группы='$group_id' WHERE Students.ID_студента=$student_id";
    $update = mysqli_query($link, $mysql_update);
    if (!$update)
        die('updating error'.mysql_error());
}
mysqli_close($link);
?>