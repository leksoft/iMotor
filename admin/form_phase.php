<?php
// รับ id ใช้ในกรณี แสดงข้อมูลด้วยปุ่มแก้ไข
@$id = $_GET['id'];

// ตรวจสอบค่า id
if (!empty($id)) {
    // กรณี id มีข้อมูลส่งมา
    // จะทำการดึงข้อมูลออกมาแสดง
    $rs = mysql_query('SELECT * FROM tbphase WHERE id = ' . $id);
    // นำข้อมูลมาเก็บใส่ตัวแปร
    $val = mysql_fetch_assoc($rs);
}
?>
<!-- form สำหรับการเพิ่มข้อมูล และ แก้ไขสาขา -->
<div style="margin-top:30px;">
    <form class="form-horizontal" action="save_phase.php" method="post">
        <legend>เพิ่มชวงเวลาการเรียน</legend>
        <div class="control-group">
            <label for="name" class="control-label">รอบ	</label>
            <div class="controls">
                <input type="text" name="around" class="span6" value="<?php echo @$val['around']; ?>">
            </div>
        </div>
        <div class="control-group">
            <label for="name" class="control-label">ช่วงเวลา	</label>
            <div class="controls">
                <input type="text" name="name" class="span6" value="<?php echo @$val['name']; ?>">
            </div>
        </div>
        <div class="form-actions">
            <input type="hidden" name="id" value="<?php echo @$val['id']; ?>">
            <input class="btn btn-success btn-large" type="submit" value="บันทึก">
            <input class="btn btn-large" type="button" value="ยกเลิก" onclick="window.location.href = 'index.php?url=index_phase.php';">
        </div>
    </form>
</div>