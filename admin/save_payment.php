<?php

include_once('../db/connection.php');
include_once('../db/function.php');

// รับตัวแปรที่ submit มาเก็บลงตัวแปร
$id = $_POST['id'];

$payment = $_POST['payment'];



// ตรวจสอบ id
if (!empty($id)) {
    // กรณี id มีค่าส่งมาจะเป็นการแก้ไข
    $sql = "
	UPDATE tbregister SET 

        payment = '$payment' ,created = NOW()
	WHERE id = $id
";
    $text_alert = 'ทำรายการแล้ว.';
} else {
    // กรณีไม่มี id ส่งค่ามาจะเป็นการ insert
    $sql = "
	INSERT INTO tbregister
	(
                payment,
                created
	) 
	VALUES 
	(
		
                '$payment',
                NOW()
	)
";
    $text_alert = 'ทำรายการแล้ว.';
}
// ตรวจสอบการ query
if (mysql_query($sql)) {
    // ถ้าผ่านจะไปที่หน้าที่เราระบุไว้
    header("location: index.php?url=index_register.php&text_alert=$text_alert");
} else {
    // error จะแสดงออกมา
    echo mysql_error();
}
?>