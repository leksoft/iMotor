<?php echo form_header("ระบบจัดการตารางเรียน"); ?>
<form method="post" action="table_lern_save.php" name="form1">
    <div>
        <label>เลือกหลักสูตร</label>
        <?php echo sql_dropdown("course_id", "tbcourse", "c_name", "id"); ?>
    </div>
   
    <div>
        <label>เลือกอาจารย์ฝึกหัด</label>
        <?php echo sql_dropdown("user_id", "tbuser", "fname", "id"); ?>
    </div>
    <div>
        <label>เลือกรอบ</label>
        <?php echo sql_dropdown("phase_around", "tbphase", "around", "around"); ?>
    </div>
     <div>
        <label>เลือกช่วงเวลา</label>
        <?php echo sql_dropdown("phase_time", "tbphase", "name", "name"); ?>
    </div>
    <div>
        <label>เลือกวันที่สอน</label>
        <input type ="text" name ="day" > * 01/05/2557 (วัน/เดือน/ปี)
    </div>
    
    <?php echo form_button(@$r["id"]); ?>
</form>
<br />
<br />

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
    <div>
        <label>หลักสูตรที่เรียน</label>
        <?php echo sql_dropdown("course_id", "tbcourse", "c_name", "id", @$_POST["course_id"]); ?>
        <label>อาจารย์ฝึกหัด</label>
        <?php echo sql_dropdown("user_id", "tbuser", "fname", "id", @$_POST["user_id"]); ?>
    </div>
    <div>
        <label></label>
        <a class="btn btn-primary" onclick="formSearch.submit()" href="#">
            <i class="icon-search icon-white"></i>
            แสดงรายการ
        </a>
    </div>
</form>

<?php if ($_POST != ""): ?>
<?php
$sql = "SELECT * FROM tb_table_learn WHERE course_id = '".@$_POST[course_id]."'";
$rs = mysql_query($sql);
$course_id = @$_POST["course_id"];
$user_id = @$_POST["user_id"];
?>
<table class="table table-bordered" border="1px" style="border-collapse: collapse; border: #808080 1px solid;">
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