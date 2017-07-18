<?php
ob_start();
session_start();
include_once('../db/connection.php');
include_once('../db/function.php');
?>
<!-- หน้าหลักของระบบ -->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Index page</title>
        <link rel="stylesheet" type="text/css" href="css/mycss.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type ="text/javascript" src="js/bootstrap-tooltip.js"></script>
        <!-- bootstrap -->
        <script type="text/javascript" src="js/bootstrap/bootstrap-alert.js"></script>

        <!-- validation -->
        <link rel="stylesheet" type="text/css" media="screen" href="js/validation/css/screen.css"/>
        <script type="text/javascript" src="js/validation/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/validation/jquery.metadata.js"></script>
        <script type="text/javascript" src="js/validation/localization/messages_th.js"></script>

        <!-- calendar -->
        <script type="text/javascript" src="js/calendar/calendarTLE.js"></script>
        <script type="text/javascript" src="js/calendar/calendar-setup.js"></script>
        <script type="text/javascript" src="js/calendar/lang/calendar-th.js"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="js/calendar/calendar-win2k-cold-1.css"/>

        <script type="text/javascript">
            $(function() {

                $.metadata.setType("attr", "validate");
                $("#myform").validate({
                    onkeyup: false
                });
                $('a').tooltip();
                $("#date").mask("99/99/9999");
            });
        </script>


    </head>
    <?php
// รับตัวแปร url สำหรับการแสดงผล
    @$url = $_GET['url'];
// กรณี url ไม่ได้ส่งค่าอะไรมา
    if (empty($url)) {
        // url จะเป็น home.php
        $url = 'home.php';
    }
    ?>
    <body style="background: url('img/bg.png') repeat-x top fixed;padding-left:0px;
          padding-top:0px;

          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <!-- ตรวจสอบ session เมื่อ login แล้ว -->
                    <?php if (isset($_SESSION['user'])): ?>
                        <div style="margin-top:20px;">
                            <!-- <div class="navbar-inner"> -->
                            <a class="brand pull-left" href="#" style="color:#eee;font-size:19px;">ระบบโรงเรียนสอนขับรถยนต์ณัฐชัย</a>
                            <ul class="inline pull-right mainMenu">
                                <!-- <li class="active"><a href="#">Home</a></li> -->
                                <li><a href="index.php?url=home.php"><i class="icon icon-home icon-white"></i> หน้าหลัก</a></li>
                                <?php
                                // ดึงข้อมูล ระดบัของผู้ใช้งาน
                                @$level = $_SESSION['user']['data']['type'];
                                // ระดับ admin
                                if ($level == 'admin'):
                                    ?>                                
                                    <li class="dropdown">
                                        <a class="dropdown-toggle"data-toggle="dropdown"href="#"> ตั้งค่าข้อมูลหลัก<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <!-- links -->
                                            <li><a data-toggle="tooltip" title="ข้อมูลรถยนต์"href="index.php?url=index_car.php"><i class="icon icon-th-list icon-black"></i> ข้อมูลรถยนต์</a></li>
                                            <li><a href="index.php?url=index_course.php"><i class="icon icon-gift icon-black"></i> หลักสูตรการเรียน/อัตราการเรียน</a></li>

                                            <li><a href="index.php?url=index_phase.php"><i class="icon icon-book icon-black"></i> ช่วงเวลาเรียน</a></li>
                                            <li><a href="index.php?url=table_lern.php"><i class="icon icon-align-center icon-black"></i> ตารางสอน</a></li>
                                            <li><a href="index.php?url=index_degree.php"><i class="icon icon-barcode icon-black"></i> สาขาต่างๆ</a></li>

                                            <li><a href="index.php?url=index_question.php"><i class="icon icon-barcode icon-black"></i> แบบทดสอบ</a></li>

                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle"data-toggle="dropdown"href="#"> ตั้งค่าข้อมูลทั่วไป<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <!-- links -->
                                            <li><a data-toggle="tooltip" title=""href="index.php?url=index_user.php"><i class="icon icon-th-list icon-black"></i> ข้อมูลสมาชิก</a></li>
                                            <li><a href="index.php?url=index_teacher.php"><i class="icon icon-gift icon-black"></i> ข้อมูลอาจารย์ฝึกหัด</a></li>
                                            <li><a href="index.php?url=index_manager.php"><i class="icon icon-user icon-black"></i> ข้อมูลผู้จัดการ</a></li>
                                            <li><a href="index.php?url=index_admin.php"><i class="icon icon-user icon-black"></i> ข้อมูลผู้ดูแลระบบ</a></li>
                                            <li class="divider"></li>
                                            <li><a href="index.php?url=index_news.php"><i class="icon icon-book icon-black"></i> ข่าวประชาสัมพันธ์</a></li>
                                            <li><a href="index.php?url=index_config.php"><i class="icon icon-barcode icon-black"></i> จัดการข้อมูลหน้าเว็บไซต์</a></li>

                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle"data-toggle="dropdown"href="#"> การลงทะเบียนเรียน<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <!-- links -->
                                            <li><a data-toggle="tooltip" title=""href="index.php?url=index_register.php"><i class="icon icon-th-list icon-black"></i> สมาชิกที่ลงทะเบียน</a></li>
                                            <li><a href="index.php?url=index_register.php"><i class="icon icon-gift icon-black"></i> ข้อมูลการชำระเงินของสมาชิก</a></li>


                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle"data-toggle="dropdown"href="#"> ระบบรายงาน<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <!-- links -->
                                            <li><a data-toggle="tooltip" title=""href="index.php?url=rpt_user.php"><i class="icon icon-th-list icon-black"></i> รายงานข้อมูลสมาชิก</a></li>
                                            <li><a href="index.php?url=rpt_teacher.php"><i class="icon icon-gift icon-black"></i> รายงานข้อมูลอาจารย์ฝึกหัด</a></li>
                                            <li><a href="index.php?url=rpt_manager.php"><i class="icon icon-user icon-black"></i> รายงานข้อมูลผู้จัดการ</a></li>
                                            <li class="divider"></li>
                                            <li><a href="index.php?url=rpt_income.php"><i class="icon icon-book icon-black"></i> รายรับ - รายจ่ายประจำเดือน</a></li>
                                            <li><a href="index.php?url=rpt_register.php"><i class="icon icon-book icon-black"></i> รายงานการสมัครเรียน</a></li>
                                            <li><a href="index.php?url=rpt_h.php"><i class="icon icon-book icon-black"></i> รายงานชั่วโมงการสอน</a></li>

                                        </ul>
                                    </li>
                                  
                                <?php elseif ($level == 'user'): ?>

                                    <li class="dropdown">
                                        <a class="dropdown-toggle"data-toggle="dropdown"href="#"> เมนูสมาชิก(ผู้เรียน)<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <!-- links -->
                                            <li><a data-toggle="tooltip" title=""href="index.php?url=profile.php"><i class="icon icon-th-list icon-black"></i> ข้อมูลส่วนตัว</a></li>
                                                
                                            <li><a href="index.php?url=regis_course.php"><i class="icon icon-gift icon-black"></i> หลักสูตรที่สมัครเรียน</a></li>
                                           
                                        </ul>
                                    </li>
                                     <?php elseif ($level == 'manager'): ?>

                                    <li class="dropdown">
                                        <a class="dropdown-toggle"data-toggle="dropdown"href="#"> เมนูสมาชิก(อาจารย์ฝึกหัด)<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <!-- links -->
                                            <li><a data-toggle="tooltip" title=""href="index.php?url=profile_t.php"><i class="icon icon-th-list icon-black"></i> ข้อมูลส่วนตัว</a></li>
                                                 <li><a href="index.php?url=rpt_register.php"><i class="icon icon-book icon-black"></i> ข้อมูลนักเรียน</a></li>
                                            <li><a href="index.php?url=rpt_h.php"><i class="icon icon-book icon-black"></i> รายงานชั่วโมงการสอน</a></li>
                                           
                                        </ul>
                                    </li>
                                <?php endif; ?>

                                <li><a href="logout.php"><i class="icon icon-off icon-white"></i> ออกจากระบบ</a></li>
                            </ul>



                            <!-- </div> -->
                        </div>

                    </div>
                </div>
                <div class="row-fluid">

                    <div class="span12 well" style="min-height:400px;margin-top:20px;border-left:1px solid white;border-right:1px solid white;border-bottom:1px solid white;">
                        <marquee onmouseover="stop();" onmouseout="start();">
                            มีข้อสงสัย/ปัญหาสอบถาม ได้ที่อีเมลล์ xxxx@hotmail.com 
                        </marquee>
                        <?php include($url); ?>
                    </div>
                </div>
                <style type="text/css">
                    .well {
                        background-color:#FEFEFE;
                    }
                    table tr .text-center{
                        text-align:center;
                        vertical-align: middle;
                    }
                    table tr .text-middle{
                        vertical-align: middle;
                    }
                    #amcFoot{
                        border-left:1px solid white;
                        border-bottom:1px solid white;
                    }
                    #amcFoot2{
                        border:1px solid white;	
                    }
                    .mainMenu a{
                        color:#eee;
                        padding-bottom:100px;
                    }
                </style>
                <?php // กรณีที่ไม่ได้ login จะถูกส่งไปยังหน้า login  ?>
            <?php else: ?>
                <script type="text/javascript">
                    window.location.href = 'login.php';
                </script>
            <?php endif; ?>
        </div>
    </body>
</html>