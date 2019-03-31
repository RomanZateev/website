<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <meta name="viewport" content="initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require 'index.php'; ?>
    <title>Document</title>
    <script type="text/javascript">
        function validate()
        {
            var error = "";
            var last_name = document.getElementById("last_name");
            if (last_name.value == "")
            {
                error = "Пожалуйста, введите фамилию";
                document.getElementById( "error_para" ).innerHTML = error;
                return false;
            }
            var name = document.getElementById("name");
            if (name.value == "")
            {
                error  = "Пожалуйста, введите имя";
                document.getElementById( "error_para" ).innerHTML = error;
                return false;
            }
            var patronymic = document.getElementById("patronymic");
            if (patronymic.value == "")
            {
                error = "Пожалуйста, введите отчество";
                document.getElementById( "error_para" ).innerHTML = error;
                return false;
            }
            var birthdate = document.getElementById("birthdate");
            if (birthdate.value == "")
            {
                error = "Пожалуйста, введите дату рождения";
                document.getElementById( "error_para" ).innerHTML = error;
                return false;
            }
            else {
                return true;
            }
        }
    </script>
    <style>
        .width {
            width: 100%;
        }
        .middle {
            width: 20%;
            margin: auto;
            padding-top: 50px;
        }
    </style>
</head>
<body>
<?php
$id = $_GET['id'];
require_once 'connection.php'; // подключаем скрипт
// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
// выполняем операции с базой данных
$student = mysqli_query($link, "SELECT * FROM Students WHERE Students.ID_студента = $id LIMIT 1");
$group = mysqli_query($link, "SELECT * FROM Groups");
$student_array_fetch = mysqli_fetch_array($student);
?>
<div class="middle">
<form method="POST" action="update.php" class="center" onsubmit="return validate()">
    <div class="form-group">
        <label>Фамилия</label>
        <div class="width">
            <?php echo "<input type='text' id='last_name' class='form-control' name='last_name' value=".$student_array_fetch["Фамилия"].">"?>
        </div>
    </div>
    <div class="form-group">
        <label>Имя</label>
        <div class="width">
            <?php echo "<input type='text' id='name' class='form-control' name='name' value=".$student_array_fetch["Имя"].">"?>
        </div>
    </div>
    <div class="form-group">
        <label>Отчество</label>
        <div class="width">
            <?php echo "<input type='text' id='patronymic' class='form-control' name='patronymic' value=".$student_array_fetch["Отчество"].">"?>
        </div>
    </div>
    <div class="form-group">
        <label>Группа</label>
        <div class="width">
        <select name="group_id" class="form-control">
            <?php 
                while ($res = mysqli_fetch_array($group)):
                    if ($res["ID_группы"] == $student_array_fetch["ID_группы"])
                        echo "<option selected='selected' value=".$res["ID_группы"].">".$res["Название группы"]."</option>";
                    else
                        echo "<option value=".$res["ID_группы"].">".$res["Название группы"]."</option>";
                endwhile; 
            ?>
        </select>
        </div>
    </div>
    <?php echo "<input type='hidden' id='student_id' name='student_id' value=".$student_array_fetch["ID_студента"].">"?>
    <input type="submit" class="btn btn-primary" value="Сохранить" name="Save">
</form>
<p id="error_para"></p>
</div>
<?php
// закрываем подключение
mysqli_close($link);
?>
</body>
</html>