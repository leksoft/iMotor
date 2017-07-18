<?php 
include_once('../db/connection.php');
include_once('../lib/function.php');

$id = $_GET['id'];

// ลบข้อมูลผู้ใช้
if(mysql_query("DELETE FROM tbuser WHERE id = $id")){
	// กรณีลบสำเร็จ
	// จะแสดงข้อความออกมา
	$text_alert = 'ลบแล้ว.';
	header("location: index.php?url=index_car.php&text_alert=$text_alert");
}else{
	// กรณีลบไม่สำเร็จ
	// แสดง error
	echo mysql_error();
}
?>