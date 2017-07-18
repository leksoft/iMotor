<?php

include_once('../db/connection.php');
include_once('../db/function.php');

// รับตัวแปรที่ submit มาเก็บลงตัวแปร
$id = $_POST['id'];
$name_car = $_POST['name_car'];
$name_code = $_POST['name_code'];
$version = $_POST['version'];
$color = $_POST['color'];
$type = $_POST['type'];
$type_car = $_POST['type_car'];

//$_FILES["filUpload"]["name"]
// ตรวจสอบ id
if (!empty($id)) {
    // กรณี id มีค่าส่งมาจะเป็นการแก้ไข
    $sql = "
	UPDATE tbcar	SET 
	name_car = '$name_car', 
	name_code = '$name_code',
	version = '$version',
	color = '$color',
        type_car = '$type_car',
        type = '$type'
        
	WHERE id = $id
";
    $text_alert = 'แก้ไขแล้ว.';
    if ($_FILES["filUpload"]["name"] != "") {
        if (move_uploaded_file($_FILES["filUpload"]["tmp_name"], "myfile/" . $_FILES["filUpload"]["name"])) {

            //*** Delete Old File ***//			
            @unlink("myfile/" . $_POST["hdnOldFile"]);

            $sql = "
	UPDATE tbcar	SET 
	name_car = '$name_car', 
	name_code = '$name_code',
	version = '$version',
	color = '$color',
        type_car = '$type_car',
        type = '$type',
        FilesName = '" . $_FILES["filUpload"]["name"] . "'
	WHERE id = $id
";
            $text_alert = 'แก้ไขแล้ว.';
        }
    }
} else {
    // กรณีไม่มี id ส่งค่ามาจะเป็นการ insert
    if (move_uploaded_file($_FILES["filUpload"]["tmp_name"], "myfile/" . $_FILES["filUpload"]["name"])) {
        $sql = "
	INSERT INTO tbcar
	(
		name_car, 
		name_code, 
		version,  
		color,
		type,
                type_car,
                FilesName
	) 
	VALUES 
	(
		'$name_car',
		'$name_code',
		'$version',
		'$color',
		'$type',
                 '$type_car',
                 '" . $_FILES["filUpload"]["name"] . "'
		
	)
";
        $text_alert = 'บันทึกแล้ว.';
    }
}
// ตรวจสอบการ query
if (mysql_query($sql)) {
    // ถ้าผ่านจะไปที่หน้าที่เราระบุไว้
    header("location: index.php?url=index_car.php&text_alert=$text_alert");
} else {
    // error จะแสดงออกมา
    echo mysql_error();
}
?>