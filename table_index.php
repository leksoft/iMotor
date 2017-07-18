<link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css">
<img src="assets/images/table.png" alt=""/>
<br/>
<style>
    .table thead tr th {
        color: white;
        background-color: #333333;
        padding: 5px;
        text-align: center;
    }
    .table tbody tr td {
        padding: 5px;
        border: #808080 1px solid;
    }
</style>
<form method="post" name="formSearch">
        <?php echo sql_dropdown("course_id", "tbcourse", "c_name", "id", @$_POST["course_id"]); ?>
       อาจารย์ฝึกหัด
        <?php echo sql_dropdown("user_id", "tbuser", "fname", "id", @$_POST["user_id"]); ?>
    

        <a class="btn btn-primary" onclick="formSearch.submit()" href="#">
            <i class="icon-search icon-white"></i>
            แสดงรายการ
        </a>

</form>

<?php if ($_POST != ""): ?>
<?php
$sql = "SELECT * FROM tb_table_learn WHERE course_id = '".@$_POST[course_id]."'";
$rs = mysql_query($sql);
$course_id = @$_POST["course_id"];
$user_id = @$_POST["user_id"];
?>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>วัน/เวลา</th>
            <th>07:00 - 09:00 น</th>
            <th>09:00 - 11:00 น</th>
            <th>11:00 - 13:00 น</th>
            <th>13:30 - 15:30 น</th>
            <th>15:30 - 17:30 น</th>
            <th>17:30 - 19:30 น</th>
        </tr>
    </thead>
    <tbody>
        <?php $arr_day = array("จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์","เสาร์","อาทิตย์"); ?>
        <?php for ($i = 0; $i < count($arr_day); $i++): ?>
        <tr>
            <td style="background-color: #999999; color: white;">
                <?php echo $arr_day[$i]; ?>
            </td>
            <td><?php echo get_subject($course_id, $user_id, 1, $i); ?></td>
            <td><?php echo get_subject($course_id, $user_id, 2, $i); ?></td>
            <td><?php echo get_subject($course_id, $user_id, 3, $i); ?></td>
            <td><?php echo get_subject($course_id, $user_id, 5, $i); ?></td>
            <td><?php echo get_subject($course_id, $user_id, 6, $i); ?></td>
            <td><?php echo get_subject($course_id, $user_id, 7, $i); ?></td>
         
        </tr>
        <?php endfor ?>
    </tbody>
</table>
<?php endif ?>