<?php
// รับ id ใช้ในกรณี แสดงข้อมูลด้วยปุ่มแก้ไข
@$id = $_GET['id'];
// ตรวจสอบค่า id
if (!empty($id)) {
    // กรณี id มีข้อมูลส่งมา
    // จะทำการดึงข้อมูลออกมาแสดง
    $rs = mysql_query('SELECT * FROM tbregister WHERE id = ' . $id);
    // นำข้อมูลมาเก็บใส่ตัวแปร
    $val = mysql_fetch_assoc($rs);
}
?>
<!-- แสดงข้อความการแจ้งเตือน -->
<?php if (isset($_GET['text_alert'])): ?>
	<div class="alert alert-error">
		<?php echo $_GET['text_alert']; ?>
	</div>	
<?php endif ?>

<legend>ข้อมูลสมาชิก</legend>
<form class="form-horizontal" action="save_register_edit.php" method="post" id ="myform">
    <input type="hidden" name="id" class="txt required"value="<?php echo @$val['id']; ?>" >


    <div class="control-group">
        <label for="fname" class="control-label">ชื่อ-นามสกุล</label>
        <div class="controls">
            <input type="text" name="name" class="txt required"value="<?php echo @$val['name']; ?>" >
        </div>
    </div>
    <div class="control-group">
        <label for="lname" class="control-label">อีเมล์</label>
        <div class="controls">
            <input type="text" name="email" class="txt required" value="<?php echo @$val['email']; ?>">
        </div>
    </div>


    <div class="control-group">
        <label for="tel" class="control-label">เบอร์โทร</label>
        <div class="controls">
            <input type="text" name="tel" class="txt required"value="<?php echo @$val['tel']; ?>">
        </div>
    </div>
    <div class="control-group">
        <label for="username" class="control-label">ที่อยู่ติดต่อ</label>
        <div class="controls">
            <?php echo @$val['addr']; ?>
        </div>
    </div>
    <legend>ข้อมูลหลักสูตรการเรียน</legend>
    <div class="control-group">
        <label for="password" class="control-label">สาขาที่ลงทะเบียน</label>
        <div class="controls">
            <?php echo @$val['degree']; ?>
        </div>
    </div>
    <div class="control-group">
        <label for="password" class="control-label">วันที่เรียน</label>
        <div class="controls">
            <?php echo @$val['r_day']; ?>
        </div>
    </div>
    <div class="control-group">
        <label for="password" class="control-label">ช่วงเวลาการเรียน</label>
        <div class="controls">
          <?php echo @$val['r_time']; ?>
        </div>
    </div>
    <div class="control-group">
        <label for="password" class="control-label">รถ</label>
        <div class="controls">
            <?php echo @$val['r_car']; ?>
        </div>
    </div>
    <div class="control-group">
        <label for="password" class="control-label">ประเภทเกียร์</label>
        <div class="controls">
           <?php echo @$val['r_gear']; ?>
        </div>
    </div>
    <legend>ข้อมูลการเข้าใช้งานระบบ</legend>
    <div class="control-group">
        <label for="username" class="control-label">username</label>
        <div class="controls">
            <input type="text" name="username" class="txt required"value="<?php echo @$val['username']; ?>">
        </div>
    </div>
    <div class="control-group">
        <label for="password" class="control-label">password</label>
        <div class="controls">
            <input type="password" name="password" class="txt required"value="<?php echo @$val['password']; ?>">
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-success btn-large" type="submit" value="บันทึก !!">
        </div>
    </div>
</form>
</div>