<?php
// รับ id ใช้ในกรณี แสดงข้อมูลด้วยปุ่มแก้ไข
@$id = $_GET['id'];
// ตรวจสอบค่า id
if (!empty($id)) {
    // กรณี id มีข้อมูลส่งมา
    // จะทำการดึงข้อมูลออกมาแสดง
    $rs = mysql_query('SELECT * FROM tbcourse WHERE id = ' . $id);
    // นำข้อมูลมาเก็บใส่ตัวแปร
    $val = mysql_fetch_assoc($rs);
}
?>
<div style="margin-top:30px;">
    <!-- form สำหรับการเพิ่มข้อมูล และ แก้ไขผู้ใช้งาน -->
    <legend>แบบฟอร์มเพิ่มหลักสูตร/อัตราการเรียน</legend>
    <form class="form-horizontal" action="save_course.php" method="post">


        <div class="control-group">
            <label for="fname" class="control-label">ชื่อหลักสูตร</label>
            <div class="controls">
                <input type="text" name="c_name" value="<?php echo @$val['c_name']; ?>" >
            </div>
        </div>
        <div class="control-group">
            <label for="lname" class="control-label">เวลาเรียน</label>
            <div class="controls">
                <input type="text" name="c_time" value="<?php echo @$val['c_time']; ?>"> หน่วยเป็นชั่วโมง ** ระบุเป็นตัวเลขเท่านั้น
            </div>
        </div>
        <div class="control-group">
            <label for="lname" class="control-label">ราคา</label>
            <div class="controls">
                <input type="text" name="c_price" value="<?php echo @$val['c_price']; ?>"> บาท ** ระบุเป็นตัวเลยเท่านั้น
            </div>
        </div>



        <div class="form-actions">
            <input type="hidden" name="id" value="<?php echo @$val['id']; ?>">
            <input class="btn btn-success btn-large" type="submit" value="บันทึก">
            <a href="index.php?url=index_course.php" class="btn btn-large">ยกเลิก</a>
        </div>
    </form>
</div>