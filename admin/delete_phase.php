<?php 
include_once('../db/connection.php');
include_once('../db/function.php');

$id = $_GET['id'];

// ทำการลบ สาขา
if(mysql_query("DELETE FROM tbphase WHERE id = $id")){
	// กรณีลบสำเร็จ
	// จะแสดงข้อความออกมา
	$text_alert = 'ลบแล้ว.';
	header("location: index.php?url=index_phase.php&text_alert=$text_alert");
}else{
	// กรณีลบไม่สำเร็จ
	// แสดง error
	echo mysql_error();
}
?>