<?php
include_once('db/connection.php');
include_once ('db/function.php');
?>
<!doctype html>
<html lang="en">
     <head>
          <meta charset="UTF-8">
          <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
          <link rel="stylesheet" type="text/css" href="css/mycss.css">
          <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
          <script type="text/javascript" src="js/bootstrap.js"></script>
          <!-- bootstrap -->
          <script type="text/javascript" src="js/bootstrap/bootstrap-alert.js"></script>

          <!-- validation -->
          <link rel="stylesheet" type="text/css" media="screen" href="js/validation/css/screen.css"/>
          <script type="text/javascript" src="js/validation/jquery.validate.min.js"></script>
          <script type="text/javascript" src="js/validation/jquery.metadata.js"></script>
          <script type="text/javascript" src="js/validation/localization/messages_th.js"></script>
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

          <title>ลงทะเบียน - REGISTER</title>
     </head>
     <body style="background: url('img/bg.png') repeat-x top fixed;">
          <div class="container">
               <div class="row">
                    <div class="span12">
                         <!-- ส่วนหัว -->
                         <center style="margin-top:14px;">
                              <h2 style="color:#f5f5f5;">ระบบคลังสินค้าอะไหล่รถยนต์ อู่ แมนเซอร์วิส</h2>
                         </center>
                         <div class="row">
                              <div class="span7 offset2 well" style="margin-top:40px;border-bottom:1px solid #f5f5f5;border-left:1px solid #f5f5f5;border-right:1px solid #f5f5f5;">
                                   <!-- แสดงข้อความการแจ้งเตือน -->
                                   <?php if (isset($_GET['text_alert'])): ?>
                                        <div class="alert alert-error">
                                             <?php echo $_GET['text_alert']; ?>
                                        </div>	
                                   <?php endif ?>
                                   <!-- form สำหรับ login -->
                                   <form action="save_register.php" method="post" class="form-horizontal" id ="myform" name ="myform">
                                        <legend>แบบฟอร์มลงทะเบียนขอใช้งานระบบ</legend>

                                        <div class="control-group">
                                             <label for="fname" class="control-label">ชื่อ <span class="required">*</span></label>
                                             <div class="controls">
                                                  <input type="text" name="fname" class ="txt required" value="" >
                                             </div>
                                        </div>
                                        <div class="control-group">
                                             <label for="lname" class="control-label">นามสกุล <span class="required">*</span></label>
                                             <div class="controls">
                                                  <input type="text" name="lname" class="txt required" value="">
                                             </div>
                                        </div>

                                        <div class="control-group">
                                             <label for="tel" class="control-label">เบอร์โทร</label>
                                             <div class="controls">
                                                  <input type="text" name="tel" value="">
                                             </div>
                                        </div>
                                        <div class="control-group">
                                             <label for="email" class="control-label">อีเมล์ <span class="required">*</span></label>
                                             <div class="controls">
                                                  <input type="text" name="email" class ="txt required" placeholder="Email">
                                             </div>
                                        </div>
                                        <div class="control-group">
                                             <label for="username" class="control-label">ชื่อผู้ใช้ <span class="required">*</span></label>
                                             <div class="controls">
                                                  <input type="text" name="username" class ="txt required" placeholder="Username">
                                             </div>
                                        </div>

                                        <div class="control-group">
                                             <label for="password" class="control-label">รหัสผ่าน <span class="required">*</span></label>
                                             <div class="controls">
                                                  <input type="password" name="password" id ="password1"class="txt required" placeholder="Password">
                                             </div>

                                        </div>
                                        <div class="control-group">
                                             <label for="password" class="control-label">ยืนยันรหัสผ่าน</label>
                                             <div class="controls">
                                                  <input type="password" class="txt required" id="password2" name="password2" equalTo="#password1" value="" />
                                             </div>                                        
                                        </div>
                                        <div class="control-group">
                                             <div class="controls">
                                                  <input class="btn btn-primary" type="submit" value="ลงทะเบียน">
                                                  <a href ="login.php">เข้าระบบ</a>
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