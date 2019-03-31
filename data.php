<?php
require_once 'connection.php'; // подключаем скрипт
// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
 
// выполняем операции с базой данных

$groupresult = mysqli_query($link, "SELECT * FROM Groups");
if($groupresult)
{
    while ($row = mysqli_fetch_assoc($groupresult))
    {
        $studresult = mysqli_query($link, "SELECT * FROM Students WHERE ID_группы =".$row["ID_группы"]);
        if ($studresult)
        {
            while($student_array_fetch = mysqli_fetch_assoc($studresult)) {
                $human_array[] = array(
                    "ID_студента" => $student_array_fetch["ID_студента"],
                    "Фамилия" => $student_array_fetch["Фамилия"],
                    "Имя" => $student_array_fetch["Имя"],
                    "Отчество" => $student_array_fetch["Отчество"],
                    "Дата рождения" => $student_array_fetch["Дата рождения"]
                );
             }
        }
        $result[$row["Название группы"]] = $human_array;
        $human_array = [];
    }
}
// закрываем подключение
mysqli_close($link);
#print_r(json_encode($result));
return $result;
?>