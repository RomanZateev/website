<?php 
function tableFormatter(){
    $array = include_once 'data.php' ;?>
    <div class="middle">
    <table class="table table-bordered">
    <tbody>
        <?php foreach($array as $key => $val) : ?>
        <tr>
            <td colspan="3" class="font-weight-bold table-active"><?php echo $key; ?></td>
        </tr>
        <tr>
            <?php if ($val) {foreach($val as $student) : ?>
            <td><?php echo $student['Фамилия']." ".$student['Имя']." ".$student['Отчество']; ?></td>
            <td><?php echo $student['Дата рождения']; ?></td>
            <td style="color:dodgerblue">
                <?php 
                    echo "<a href=edit.php?id=".$student['ID_студента'].">"
                ?>
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href=addform.php>
                    <span class="glyphicon glyphicon-user"></span>
                </a>
                <?php 
                    echo "<a href=delete.php?id=".$student['ID_студента'].">"
                ?>
                    <span class="glyphicon glyphicon-remove"></span>
                </a>                
            </td>
        </tr>
        <?php endforeach; }?>
        <?php endforeach; ?>
    </tbody>
    </table>
    </div>
<?php  
}
?>
