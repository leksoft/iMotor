<?php 
include('../db/connection.php');
include('../db/function.php');

$id = $_GET['id'];

// ลบข้อมูลผู้ใช้
if(mysql_query("DELETE FROM tbregister WHERE id = $id")){
	// กรณีลบสำเร็จ
	// จะแสดงข้อความออกมา
	$text_alert = 'ลบแล้ว.';
	header("location: index.php?url=index_user.php&text_alert=$text_alert");
}else{
	// กรณีลบไม่สำเร็จ
	// แสดง error
	echo mysql_error();
}
?>