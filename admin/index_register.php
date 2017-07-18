<?php
// ดึงข้อมูลมาใส่ ตัวแปร
$rs = mysql_query('SELECT * FROM tbregister ');
?>
<!-- ปุ่มเพิ่ม -->
<a href="#" class="btn btn-large btn-info"><i class="icon icon-plus icon-white"></i> รายการสมาชิกที่ลงทะเบียนเรียนทั้งหมด</a>
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
            <th>ยอดเงินที่ต้องชำระ</th>
            <th>เบอร์โทร</th>
            <th>สถานะการชำระเงิน</th>
            <th></th>
            <th class="text-center" width="50px">แก้ไข</th>
            <th class="text-center" width="50px">ลบ</th>
        </tr>
    </thead>
    <tbody>
        <!-- ดึงข้อมูลมาแสดง -->
        <?php $i = 1;
        while ($val = mysql_fetch_assoc($rs)):
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $val['name']; ?></td>
                <?php
                $rs_c = mysql_query('SELECT * FROM tbcourse WHERE id = ' . $val['course_id']);
                while ($val_c = mysql_fetch_assoc($rs_c)):
                    ?>

                    <td><?php echo $val_c['c_name']; ?></td>	
                     <td><?php echo $val_c['c_price']; ?></td>	
    <?php endwhile; ?>
                <td><?php echo $val['tel']; ?></td>		
                <td><?php echo $val['payment']; ?></td>	
                <td><?php echo $val['created']; ?></td>
                <td class="text-center"><a href="index.php?url=form_payment.php&id=<?php echo $val['id']; ?>"><i class="icon icon-edit"></i> จัดการ</a></td>
                <td class="text-center"><a href="delete_register.php?id=<?php echo $val['id']; ?>" onclick="return confirm('ยืนยันการลบ ?');"><i class="icon icon-trash"></i> ยกเลิก</a></td>
            </tr>
<?php endwhile; ?>
    </tbody>
</table>

<div class="alert alert-error">*** หากสามารถสมัครแล้วยังไม่ทำการชำระเงิน เจ้าหน้าที่จะยกเลิกรายการทันที หากไม่ติดต่อชำระเงินภายใน 7 วัน</div>