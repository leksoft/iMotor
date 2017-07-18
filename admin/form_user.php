<?php 
// รับ id ใช้ในกรณี แสดงข้อมูลด้วยปุ่มแก้ไข
@$id = $_GET['id'];
// ตรวจสอบค่า id
if(!empty($id)){
	// กรณี id มีข้อมูลส่งมา
	// จะทำการดึงข้อมูลออกมาแสดง
	$rs = mysql_query('SELECT * FROM tbuser WHERE id = '.$id);
	// นำข้อมูลมาเก็บใส่ตัวแปร
	$val = mysql_fetch_assoc($rs);
}

?>
<div style="margin-top:30px;">
<!-- form สำหรับการเพิ่มข้อมูล และ แก้ไขผู้ใช้งาน -->
<legend>ลงทะเบียนสมาชิก</legend>
<form class="form-horizontal" action="save_user.php" method="post">
	
	<div class="control-group">
		<label for="type" class="control-label">ระดับ</label>
		<div class="controls">
			<?php echo level_options(@$val['type']); ?>
		</div>
	</div>
	<div class="control-group">
		<label for="fname" class="control-label">ชื่อ</label>
		<div class="controls">
			<input type="text" name="fname" value="<?php echo @$val['fname']; ?>" >
		</div>
	</div>
	<div class="control-group">
		<label for="lname" class="control-label">นามสกุล</label>
		<div class="controls">
			<input type="text" name="lname" value="<?php echo @$val['lname']; ?>">
		</div>
	</div>
	<div class="control-group">
		<label for="gender" class="control-label">เพศ</label>
		<div class="controls">
			<?php echo gender_options(@$val['gender']); ?>
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