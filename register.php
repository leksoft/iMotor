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

<!-- form สำหรับการเพิ่มข้อมูล และ แก้ไขผู้ใช้งาน -->
<legend>ลงทะเบียนเรียนกับเรา</legend>
<form class="form-horizontal" action="save_register.php" method="post" id ="myform">


    <div class="control-group">
        <label for="fname" class="control-label">ชื่อ-นามสกุล</label>
        <div class="controls">
            <input type="text" name="name" class="txt required"value="" >
        </div>
    </div>
    <div class="control-group">
        <label for="lname" class="control-label">อีเมล์</label>
        <div class="controls">
            <input type="text" name="email" class="txt required" value="">
        </div>
    </div>


    <div class="control-group">
        <label for="tel" class="control-label">เบอร์โทร</label>
        <div class="controls">
            <input type="text" name="tel" class="txt required"value="">
        </div>
    </div>
    <div class="control-group">
        <label for="username" class="control-label">ที่อยู่ติดต่อ</label>
        <div class="controls">
            <textarea type="text" name="addr" rows="3" cols="3" class="txt required"></textarea>
        </div>
    </div>
    <legend>ข้อมูลหลักสูตรการเรียน</legend>
    <div class="control-group">
        <label for="password" class="control-label">เลือกหลักสูตร</label>
        <div class="controls">
            <?php echo course_options(); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="password" class="control-label">เลือกสาขา</label>
        <div class="controls">
            <?php echo degree_options(); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="password" class="control-label">เลือกวันที่เรียน</label>
        <div class="controls">
            <input type='text' id='date' name='r_day' style="width:80px" value="" class="required"/>
            <span class="btn" type="button" id="cal_rdate" tabindex="-1"><i class="icon-calendar"></i></span>
            <script type="text/javascript">
                Calendar.setup({
                    inputField: "date",
                    button: "cal_rdate",
                    ifFormat: "%d/%m/%Y"
                });
            </script>
        </div>
    </div>
    <div class="control-group">
        <label for="password" class="control-label">เลือกช่วงเวลาการเรียน</label>
        <div class="controls">
            <?php echo phase_options(); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="password" class="control-label">เลือกรถ</label>
        <div class="controls">
            <?php echo car_options(); ?> ** เลือกรถที่ต้องการจองไว้
        </div>
    </div>
    <div class="control-group">
        <label for="password" class="control-label">เลือกประเภทเกียร์</label>
        <div class="controls">
            <?php echo gear_options_car(); ?>
        </div>
    </div>
    <legend>ข้อมูลการเข้าใช้งานระบบ</legend>
    <div class="control-group">
		<label for="username" class="control-label">username</label>
		<div class="controls">
			<input type="text" name="username" class="txt required"value="">
		</div>
	</div>
	<div class="control-group">
		<label for="password" class="control-label">password</label>
		<div class="controls">
			<input type="password" name="password" class="txt required"value="">
		</div>
	</div>
    <div class="alert alert-error">*** หากสมาชิกสมัครเรียนแล้วยังไม่ทำการชำระเงิน เจ้าหน้าที่จะยกเลิกรายการทันที หากไม่ติดต่อชำระเงินภายใน 7 วัน</div>
    <div class="control-group">
        <div class="controls">
             <input type="hidden" name="payment" class="txt required" value="ยังไม่ชำระเงิน" >
            <input class="btn btn-success btn-large" type="submit" value="ลงทะเบียนเรียน !!">
        </div>
    </div>
</form>
