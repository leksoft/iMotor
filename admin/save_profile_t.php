<?php
include_once('../db/connection.php');
include_once('../db/function.php');

// รับตัวแปรที่ submit มาเก็บลงตัวแปร
$id = $_POST['id'];
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$gender = $_POST['email'];
$telphone = $_POST['tel'];
$username = $_POST['username'];
$password = $_POST['password'];


// ตรวจสอบ id
if(!empty($id)){
	// กรณี id มีค่าส่งมาจะเป็นการแก้ไข
	$sql = "
	UPDATE tbuser	SET 
	fname = '$firstname', 
	lname = '$lastname',
	email = '$gender',
	tel = '$telphone',
	username = '$username',
	password = '$password' 
	WHERE id = $id
";
$text_alert = 'แก้ไขแล้ว.';
}else{
	// กรณีไม่มี id ส่งค่ามาจะเป็นการ insert
	$sql = "
	INSERT INTO tbuser
	(
		fname, 
		lname, 
		email,  
		tel,
		username,
		password
	) 
	VALUES 
	(
		'$firstname',
		'$lastname',
		'$gender',
		'$tel',
		'$username',
		'$password'
	)
";
$text_alert = 'บันทึกแล้ว.';
}
// ตรวจสอบการ query
if(mysql_query($sql)){	
	// ถ้าผ่านจะไปที่หน้าที่เราระบุไว้
	header("location: index.php?url=profile_t.php&text_alert=$text_alert");
}else{
	// error จะแสดงออกมา
	echo mysql_error();
}
?>