<?php

include_once('../db/connection.php');
include_once('../db/function.php');

// รับตัวแปรที่ submit มาเก็บลงตัวแปร
$id = $_POST['id'];
$c_name = $_POST['c_name'];
$c_time = $_POST['c_time'];
$c_pirce = $_POST['c_price'];



// ตรวจสอบ id
if (!empty($id)) {
    // กรณี id มีค่าส่งมาจะเป็นการแก้ไข
    $sql = "
	UPDATE tbcourse	SET 
	c_name = '$c_name', 
	c_time = '$c_time',
	c_price = '$c_pirce'	
	WHERE id = $id
";
    $text_alert = 'แก้ไขแล้ว.';
} else {
    // กรณีไม่มี id ส่งค่ามาจะเป็นการ insert
    $sql = "
	INSERT INTO tbcourse
	(
		c_name, 
		c_time, 
		c_price
		
	) 
	VALUES 
	(
		'$c_name',
		'$c_time',
		'$c_pirce'
		
	)
";
    $text_alert = 'บันทึกแล้ว.';
}
// ตรวจสอบการ query
if (mysql_query($sql)) {
    // ถ้าผ่านจะไปที่หน้าที่เราระบุไว้
    header("location: index.php?url=index_course.php&text_alert=$text_alert");
} else {
    // error จะแสดงออกมา
    echo mysql_error();
}
?>