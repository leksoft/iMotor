<?php
// ดึงข้อมูลมาใส่ ตัวแปร
$rs = mysql_query('SELECT tbcourse.c_name as c_name ,tbuser.fname AS f_name,tbuser.lname AS l_name,tb_table_lern.phase_time AS phase_time,tb_table_lern.day AS t_date FROM tb_table_lern LEFT JOIN tbuser ON (tb_table_lern.user_id = tbuser.id) LEFT JOIN tbcourse ON (tb_table_lern.course_id = tbcourse.id)');
?>
<!-- ปุ่มเพิ่ม -->

<br><br>
<!-- แสดงข้อความการแจ้งเตือน -->
<?php if (isset($_GET['text_alert'])): ?>
    <div class="alert alert-error">
        <?php echo $_GET['text_alert']; ?>
    </div>	
<?php endif ?>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th width="50px">ลำดับ</th>
            <th>ชื่อ-สกุล</th>
            <th>หลักสุตรที่ลงทะเบียน</th>
            <th>ช่วงเวลาสอน</th>
            <th>วันที่สอน</th>

        </tr>
    </thead>
    <tbody>
        <!-- ดึงข้อมูลมาแสดง -->
        <?php $i = 1;
        while ($val = mysql_fetch_assoc($rs)):
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $val['f_name']." ".$val['l_name']; ?></td>
               
                <td><?php echo $val['c_name']; ?></td>		
                <td><?php echo $val['phase_time']; ?></td>
                <td><?php echo $val['t_date']; ?></td>
               
              
              
            </tr>
<?php endwhile; ?>
    </tbody>
</table>
