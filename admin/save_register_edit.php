<?php

include_once('../db/connection.php');
include_once('../db/function.php');

// รับตัวแปรที่ submit มาเก็บลงตัวแปร
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$add = $_POST['addr'];
$tel = $_POST['tel'];
$degree = $_POST['degree'];
$day = dateToMysql($_POST['r_day']);
$time = $_POST['r_time'];
$gear = $_POST['r_gear'];
$car = $_POST['r_car'];
$username = $_POST['username'];
$password = $_POST['password'];
$payment = $_POST['payment'];
$status = 'ยังไม่ชำระเงิน';


// ตรวจสอบ id
if (!empty($id)) {
    // กรณี id มีค่าส่งมาจะเป็นการแก้ไข
    $sql = "
	UPDATE tbregister SET 
	name = '$name', 
	email = '$email',
	addr = '$add',
	tel = '$tel',
        payment = '$payment',
        status = '$status'
	WHERE id = $id
";
    $text_alert = 'แก้ไขแล้ว.';
} else {
    // กรณีไม่มี id ส่งค่ามาจะเป็นการ insert
    $sql = "
	INSERT INTO tbregister
	(
		name, 
		email, 
		addr,  
		tel,
		degree,
		r_day,
		r_time,
                r_gear,
                r_car,
                payment,
                status,
                username,
                password,
                created
	) 
	VALUES 
	(
		'$name',
		'$email',
		'$add',
		'$tel',
		'$degree',
		'$day',
		'$time',
                '$gear',
                '$car',
                '$payment',
                '$status',
                '$username',
                '$password',
                NOW()
	)
";
    $text_alert = 'การทำรายการเสร็จสมบูรณ์';
}
// ตรวจสอบการ query
if (mysql_query($sql)) {
    // ถ้าผ่านจะไปที่หน้าที่เราระบุไว้
    header("location: index.php?url=form_register.php&id=$id&text_alert=$text_alert");
} else {
    // error จะแสดงออกมา
    echo mysql_error();
}
?>