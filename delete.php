<?php
header('Location: index.html');
$id = $_GET['id'];
require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
echo $student_id;
$mysql_delete = "DELETE FROM Students WHERE Students.ID_студента=$id LIMIT 1";
$delete = mysqli_query($link, $mysql_delete);
if (!$delete)
    die('deleting error'.mysql_error());
mysqli_close($link);
?>