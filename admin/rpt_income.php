<?php
// ดึงข้อมูลมาใส่ ตัวแปร
$rs = mysql_query('SELECT * FROM tbregister ');
?>
<!-- ปุ่มเพิ่ม -->
<a href="#" class="btn btn-large btn-info"><i class="icon icon-plus icon-white"></i> รายรับรายจ่าย</a>
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

            <th>หลักสุตรที่ลงทะเบียน</th>
            <th>ยอดเงิน</th>
        </tr>
    </thead>
    <tbody>
        <!-- ดึงข้อมูลมาแสดง -->
        <?php $i = 1;
        while ($val = mysql_fetch_assoc($rs)):
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
       
                <?php
                $rs_c = mysql_query('SELECT * FROM tbcourse WHERE id = ' . $val['course_id']);
                while ($val_c = mysql_fetch_assoc($rs_c)):
                    ?>

                    <td><?php echo $val_c['c_name']; ?></td>	
                     <td><?php echo $val_c['c_price']; ?></td>	
    <?php endwhile; ?>
                       
            </tr>
<?php endwhile; ?>
    </tbody>
</table>
<?php 
       $sql = "SELECT SUM(tbcourse.c_price) AS total  FROM tbregister,tbcourse WHERE tbregister.course_id = tbcourse.id "; 
       $sum = mysql_query($sql);
       $r = mysql_fetch_assoc($sum);
?>
<div class="alert alert-error">ยอดเงินรวมทั้งหมด ที่ได้จากการสมัครเรียน = <?php echo $r['total'];?> บาท</div>