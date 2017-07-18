<?php
// รับ id ใช้ในกรณี แสดงข้อมูลด้วยปุ่มแก้ไข
@$id = $_GET['id'];
// ตรวจสอบค่า id
if (!empty($id)) {
    // กรณี id มีข้อมูลส่งมา
    // จะทำการดึงข้อมูลออกมาแสดง
    $rs = mysql_query('SELECT * FROM tbcar WHERE id = ' . $id);
    // นำข้อมูลมาเก็บใส่ตัวแปร
    $val = mysql_fetch_assoc($rs);
}
?>
<div style="margin-top:30px;">
    <!-- form สำหรับการเพิ่มข้อมูล และ แก้ไขผู้ใช้งาน -->
    <legend>ข้อมูลรถยนต์</legend>
    <form class="form-horizontal" action="save_car.php" method="post" enctype="multipart/form-data">

        <div class="control-group">
            <label for="type" class="control-label">ประเภทเกียร์</label>
            <div class="controls">
                <?php echo level_options_car(@$val['type']); ?>
            </div>
        </div>
         <div class="control-group">
            <label for="type" class="control-label">ประเภทรถ</label>
            <div class="controls">
                <?php echo level_options_type_car(@$val['type_car']); ?>
            </div>
        </div>
        <div class="control-group">
            <label for="" class="control-label">ยี่ห้อรถ</label>
            <div class="controls">
                <input type="text" name="name_car" value="<?php echo @$val['name_car']; ?>" >
            </div>
        </div>
        <div class="control-group">
            <label for="" class="control-label">ทะเบียนรถ</label>
            <div class="controls">
                <input type="text" name="name_code" value="<?php echo @$val['name_code']; ?>">
            </div>
        </div>

        <div class="control-group">
            <label for="" class="control-label">รุ่น</label>
            <div class="controls">
                <input type="text" name="version" value="<?php echo @$val['version']; ?>">
            </div>
        </div>
        <div class="control-group">
            <label for="" class="control-label">สีรถ</label>
            <div class="controls">
                <input type="text" name="color" value="<?php echo @$val['color']; ?>">
            </div>
        </div>
        <div class="control-group">
            <label for="" class="control-label">รูปรถ</label>
            <div class="controls">
                <input type="file" name="filUpload">
                <input type="hidden" name="hdnOldFile" value="<?=@$val["FilesName"];?>">
            </div>
        </div>
        <div class="form-actions">
            <input type="hidden" name="id" value="<?php echo @$val['id']; ?>">
            <input class="btn btn-success btn-large" type="submit" value="บันทึก">
            <a href="index.php?url=index_car.php" class="btn btn-large">ยกเลิก</a>
        </div>
    </form>
</div>