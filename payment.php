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
<legend>ระบบแจ้งชำระเงิน</legend>
<table class="display normal-t" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td>ชื่อผู้สมัคร :</td>
        <td><?php echo @$val['name']; ?></td>
    </tr>
     <tr>
        <td>ที่อยู่สำหรับการติดต่อ :</td>
        <td><?php echo @$val['addr']; ?></td>
    </tr>
     <tr>
        <td>อีเมล์ :</td>
        <td><?php echo @$val['email']; ?></td>
    </tr>
    <tr>
        <td>โทร :</td>
        <td><?php echo @$val['tel']; ?></td>
    </tr>
     <tr>
        <td>สาขาที่เลือกสมัคร :</td>
        <td><?php echo @$val['degree']; ?></td>
    </tr>
     <tr>
        <td>วันที่เรียน :</td>
        <td><?php echo @$val['r_day']; ?></td>
    </tr>
     <tr>
        <td> รอบการเรียน :</td>
        <td><?php echo @$val['r_time']; ?></td>
    </tr>
     <tr>
        <td> ระบบเกียร์ที่เลือก :</td>
        <td><?php echo @$val['r_gear']; ?></td>
    </tr>
    <tr>
        <td>ยี่ห้อรถ :</td>
        <td><?php echo @$val['r_car']; ?></td>
    </tr>
     <tr>
        <td>สถานะการชำระเงิน :</td>
        <td><b><?php echo @$val['payment']; ?><b/></td>
    </tr>
</table>
<legend>---</legend>
<form class="form-horizontal" action="save_payment.php" method="post" id ="myform">
    <input type="hidden" name="id" class="txt required"value="<?php echo @$val['id']; ?>" >
     <input type="hidden" name="payment" class="txt required" value="ชำระเงินแล้ว" >

    
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-success btn-large" type="submit" value="แจ้งชำระเงิน !!">
        </div>
    </div>
</form>

