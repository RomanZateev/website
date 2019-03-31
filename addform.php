<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <meta name="viewport" content="initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
    <div class="middle">
        <form method="POST" action="add.php" class="center" onsubmit="return validate()">
            <div class="form-group">
                <label>Фамилия</label>
                <div class="width">
                    <input type='text' id='last_name' class='form-control' name='last_name' value="">
                </div>
            </div>
            <div class="form-group">
                <label>Имя</label>
                <div class="width">
                    <input type='text' id='name' class='form-control' name='name' value="">
                </div>
            </div>
            <div class="form-group">
                <label>Отчество</label>
                <div class="width">
                    <input type='text' id='patronymic' class='form-control' name='patronymic' value="">
                </div>
            </div>
            <div class="form-group">
                <label>Дата рождения</label>
                <div class="width">
                    <input type="date" id='birthdate' class='form-control' name='birthdate' value="">
                </div>
            </div>
            <div class="form-group">
                <label>Группа</label>
                <div class="width">
                <select name="group_id" class="form-control">
                    <?php
                        require_once 'connection.php';
                        $link = mysqli_connect($host, $user, $password, $database) 
                            or die("Ошибка " . mysqli_error($link));
                        $group = mysqli_query($link, "SELECT * FROM Groups");
                        while ($res = mysqli_fetch_array($group)):
                                echo "<option value=".$res["ID_группы"].">".$res["Название группы"]."</option>";
                        endwhile;
                        mysqli_close($link);
                    ?>
                </select>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Сохранить" name="Save">
        </form>
        <p id="error_para"></p>
        </div>
</body>
</html>