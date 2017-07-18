<?php
@session_start();
$memberData = $_SESSION['user']['data'];
$user_id = $memberData['id'];
// รับ id ใช้ในกรณี แสดงข้อมูลด้วยปุ่มแก้ไข
$id = $user_id;
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

<div style="margin-top:30px;">
    <!-- form สำหรับการเพิ่มข้อมูล และ แก้ไขผู้ใช้งาน -->
    <legend>ข้อมูลสว่นตัว</legend>
    <form class="form-horizontal" action="save_profile.php" method="post">

       
        <div class="control-group">
            <label for="fname" class="control-label">ชื่อ</label>
            <div class="controls">
                <input type="text" name="name" value="<?php echo @$val['name']; ?>" >
            </div>
        </div>
        <div class="control-group">
            <label for="fname" class="control-label">ที่อยู่</label>
            <div class="controls">
                <input type="text" name="addr" value="<?php echo @$val['addr']; ?>" >
            </div>
        </div>
        <div class="control-group">
            <label for="fname" class="control-label">อีเมล์</label>
            <div class="controls">
                <input type="text" name="email" value="<?php echo @$val['email']; ?>" >
            </div>
        </div>

        <div class="control-group">
            <label for="tel" class="control-label">เบอร์โทร</label>
            <div class="controls">
                <input type="text" name="tel" value="<?php echo @$val['tel']; ?>">
            </div>
        </div>
        <div class="control-group">
            <label for="username" class="control-label">username</label>
            <div class="controls">
                <input type="text" name="username" value="<?php echo @$val['username']; ?>">
            </div>
        </div>
        <div class="control-group">
            <label for="password" class="control-label">password</label>
            <div class="controls">
                <input type="password" name="password" value="<?php echo @$val['password']; ?>">
            </div>
        </div>
        <div class="form-actions">
            <input type="hidden" name="id" value="<?php echo @$val['id']; ?>">
            <input class="btn btn-success btn-large" type="submit" value="บันทึก">
            <a href="index.php?url=index_user.php" class="btn btn-large">ยกเลิก</a>
        </div>
    </form>
</div>