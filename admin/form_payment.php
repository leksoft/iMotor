<link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css">
<!-- validation -->
<link rel="stylesheet" type="text/css" media="screen" href="assets/js/validation/css/screen.css"/>
<script type="text/javascript" src="assets/js/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/validation/jquery.metadata.js"></script>
<script type="text/javascript" src="assets/js/validation/localization/messages_th.js"></script>
<!-- calendar -->
<script type="text/javascript" src="assets/js/calendar/calendarTLE.js"></script>
<script type="text/javascript" src="assets/js/calendar/calendar-setup.js"></script>
<script type="text/javascript" src="assets/js/calendar/lang/calendar-th.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="assets/js/calendar/calendar-win2k-cold-1.css"/>
<script type="text/javascript">
    $(function() {
        $.metadata.setType("attr", "validate");
        $("#myform").validate({
            onkeyup: false,
            messages: {
                password2: {
                    equalTo: "กรอกรหัสผ่านให้ตรงกัน"
                }
            }
        });
        $("#date").mask("99/99/9999");
    });
</script>
<?php
// รับ id ใช้ในกรณี แสดงข้อมูลด้วยปุ่มแก้ไข
@$id = $_GET['id'];
// ตรวจสอบค่า id
if (!empty($id)) {
    // กรณี id มีข้อมูลส่งมา
    // จะทำการดึงข้อมูลออกมาแสดง
    $rs = mysql_query('SELECT * FROM tbregister WHERE id = ' . $id);
    // นำข้อมูลมาเก็บใส่ตัวแปร
    $val = mysql_fetch_assoc($rs);
}
?>
<!-- แสดงข้อความการแจ้งเตือน -->
<?php if (isset($_GET['text_alert'])): ?>
    <div class="alert alert-error">
        <?php echo $_GET['text_alert']; ?>
    </div>	
<?php endif ?>

<!-- form สำหรับการเพิ่มข้อมูล และ แก้ไขผู้ใช้งาน -->
<legend>เลือกทำรายการ</legend>
<form class="form-horizontal" action="save_payment.php" method="post" id ="myform">
    <input type="hidden" name="id" class="txt required"value="<?php echo @$val['id']; ?>" >

    <div class="control-group">
        <label for="fname" class="control-label">ชื่อ-นามสกุล</label>
        <div class="controls">
            <input type="text" disabled=""name="name" class="txt required"value="<?php echo @$val['name']; ?>" >
            <input type="hidden" name="payment" class="txt required" value="ชำระเงินแล้ว" >
        </div>
    </div>
    <div class="control-group">
        <label for="lname" class="control-label">อีเมล์</label>
        <div class="controls">
            <input type="text" name="email" disabled=""class="txt required" value="<?php echo @$val['email']; ?>">
        </div>
    </div>


    <div class="control-group">
        <label for="tel" class="control-label">เบอร์โทร</label>
        <div class="controls">
            <input type="text" name="tel" disabled=""class="txt required"value="<?php echo @$val['tel']; ?>">
        </div>
    </div>
    <div class="control-group">
        <label for="username" class="control-label">ที่อยู่ติดต่อ</label>
        <div class="controls">
            <textarea type="text" name="addr" disabled="" disabled=""rows="3" cols="3" class="txt required"><?php echo @$val['addr']; ?></textarea>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <input class="btn btn-success btn-large" type="submit" value="เปลี่ยนสถานะเป็นชำระเงินแล้ว !!">
        </div>
    </div>
</form>

