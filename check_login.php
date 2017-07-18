<?php 
/**
* ตรวจสอบการทำงานของ login	
*/
session_start();
include('db/connection.php');
include('db/function.php');

// รับค่าจาก กำรกด login มาเก็บใส่ตัวแปร
$username = $_POST['username'];
$password = $_POST['password'];

// คำสั่งค้นหา user กับ pass
$rs = mysql_query("
	SELECT * FROM tbregister 
	WHERE username = '$username' AND password = '$password'
");
// ดึงข้อมูลที่หาเจอ
$value = mysql_fetch_assoc($rs);

//  กรณีถ้าหาเจอ
if(!empty($value)){	
	// จะเก็บข้อมูล ใส่ session
	$_SESSION['user'] = array('data'=>$value);	
	?>
	<script type="text/javascript">
		window.location.href='admin/index.php';
	</script>
	<?php
}else{
	// กรณีที่ login ไม่ผ่าน จะเก็บข้อความ ไว้ใน session
	$_SESSION['fail_text'] = 'username หรือ password ไม่ถูกต้อง';
 header("location:login_user.php");
	
}
?>