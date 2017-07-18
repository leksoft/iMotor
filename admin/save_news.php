<?php
include_once('../db/connection.php');
include_once('../db/function.php');

// รับตัวแปรที่ submit มาเก็บลงตัวแปร
$id = $_POST['id'];
$name = $_POST['news_name'];
$detail = $_POST['news_detail'];



// ตรวจสอบ id
if(!empty($id)){
	// กรณี id มีค่าส่งมาจะเป็นการแก้ไข
	$sql = "
	UPDATE tbnews	SET 
	news_name = '$name', 
	news_detail = '$detail',
	date = NOW()
	WHERE id = $id
";
$text_alert = 'แก้ไขแล้ว.';
}else{
	// กรณีไม่มี id ส่งค่ามาจะเป็นการ insert
	$sql = "
	INSERT INTO tbnews
	(
		news_name, 
		news_detail,
                date
		
	) 
	VALUES 
	(
		'$name',
		'$detail',
                 NOW()
		
	)
";
$text_alert = 'บันทึกแล้ว.';
}
// ตรวจสอบการ query
if(mysql_query($sql)){	
	// ถ้าผ่านจะไปที่หน้าที่เราระบุไว้
	header("location: index.php?url=index_news.php&text_alert=$text_alert");
}else{
	// error จะแสดงออกมา
	echo mysql_error();
}
?>