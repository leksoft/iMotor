<?php 
@session_start();
include_once('db/connection.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="admin/css/mycss.css">
        <script type="text/javascript" src="admin/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="admin/js/bootstrap.js"></script>
          <!-- bootstrap -->
          <script type="text/javascript" src="admin/js/bootstrap/bootstrap-alert.js"></script>

          <!-- validation -->
          <link rel="stylesheet" type="text/css" media="screen" href="admin/js/validation/css/screen.css"/>
          <script type="text/javascript" src="admin/js/validation/jquery.validate.min.js"></script>
          <script type="text/javascript" src="admin/js/validation/jquery.metadata.js"></script>
          <script type="text/javascript" src="admin/js/validation/localization/messages_th.js"></script>
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

               });
          </script>

	<title>Login</title>
</head>
<body style="background: #f5f5f5 url('admin/img/bg.png') repeat-x;">
<div class="container">
	<div class="row">
		<div class="span12">
			<!-- ส่วนหัว -->
			<center style="margin-top:14px;">
				<h2 style="color:#f5f5f5;">โรงเรียนสอนขับรถยนต์ณัฐชัย</h2>
			</center>
			<div class="row">
				<div class="span7 offset2 well" style="margin-top:40px;border-bottom:1px solid #f5f5f5;border-left:1px solid #f5f5f5;border-right:1px solid #f5f5f5;">
					<!-- แสดงข้อความแจ้งเตือน -->
					<?php if(isset($_SESSION['fail_text'])): ?>
						<div class="alert alert-error">
							<?php echo $_SESSION['fail_text']; ?>
						</div>
					<?php endif; ?>
					<!-- form สำหรับ login -->
                                        <form action="check_login.php" method="post" class="form-horizontal" id ="myform">
						<legend>เข้าสู่ระบบสำหรับผู้สมัคร</legend>
						<!-- <input type="text" name="username" placeholder="Username">
						<input type="password" name="password" placeholder="Password">
						<input class="btn btn-primary" type="submit" value="เข้าสู่ระบบ"> -->
						<div class="control-group">
                                                                 <label for="username" class="control-label">ชื่อผู้ใช้ <span class="required">*</span></label>
							<div class="controls">
								<input type="text" name="username" class ="txt required" placeholder="Username">
							</div>
						</div>
						<div class="control-group">
                                                                 <label for="password" class="control-label">รหัสผ่าน <span class="required">*</span></label>
							<div class="controls">
                                                                           <input type="password" name="password" class="txt required" placeholder="Password">
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<input class="btn btn-primary" type="submit" value="เข้าสู่ระบบ">
                                                             
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>