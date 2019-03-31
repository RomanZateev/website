<?php   
require_once 'connection.php'; // подключаем скрипт
// подключаемся к серверу
if (isset($_POST['Save']))
{
    header('Location: index.html');
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $patronymic = $_POST['patronymic'];
    $group_id = $_POST['group_id'];
    $birthdate = $_POST['birthdate'];
    $mysql_add = "INSERT INTO Students(Имя, Фамилия, Отчество, `Дата рождения`, ID_группы) VALUES ('$name', '$last_name', '$patronymic', '$birthdate', '$group_id')";
    $add = mysqli_query($link, $mysql_add);
    if (!$add)
        die('adding error'.mysql_error());
    mysqli_close($link);
}
?>