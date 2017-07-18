<?php
include_once('db/connection.php');
include_once('db/function.php');

// รับตัวแปรที่ submit มาเก็บลงตัวแปร

$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$telphone = $_POST['tel'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$level = "user";


	// กรณีไม่มี id ส่งค่ามาจะเป็นการ insert
	$sql = "
	INSERT INTO tbuser
	(
		fname, 
		lname,  
		tel,
		type,
                    email,
		username,
		password
	) 
	VALUES 
	(
		'$firstname',
		'$lastname',
		'$tel',
		'$level',
                    '$email',
		'$username',
		'$password'
	)
";
$text_alert = 'ลงทะเบียนเสร็จเรียบร้อยแล้ว ท่านสามารถเข้าใช้งานระบบได้ทันที.';

// ตรวจสอบการ query
if(mysql_query($sql)){	
	// ถ้าผ่านจะไปที่หน้าที่เราระบุไว้
	header("location: index.php?url=register.php&text_alert=$text_alert");
}else{
	// error จะแสดงออกมา
	echo mysql_error();
}
?>

