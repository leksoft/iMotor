<?php
ob_start();
session_start();
include_once('db/connection.php');
include_once('db/function.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="stats-in-th" content="430a" />
        <META NAME="Keywords" CONTENT="โรงเรียนสอนขับรถยนต์ณัฐชัย" />
        <title>โรงเรียนสอนขับรถยนต์ณัฐชัย</title>

        <link rel="stylesheet" href="assets/css/reset.css" type="text/css"/>
        <link rel="stylesheet" href="assets/css/font.css" type="text/css"/>
        <link rel="stylesheet" href="assets/css/default.css" type="text/css"/>
        <link rel="stylesheet" href="assets/css/demo_table_jui.css" type="text/css"/>
        <script type="text/javascript" src="assets/js/jquery-1.4.1.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.cycle.all.min.js"></script>

        <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
        <style type="text/css"> @import url("assets/css/jquery.lightbox-0.5.css"); </style>
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
        <script type="text/javascript">
            $(document).ready(function() {
                $('.slideshow')
                        .after('<div id="nav">')
                        .cycle({
                            fx: 'scrollLeft', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
                            timeout: 8000,
                            delay: -2000,
                            pager: '#nav'
                        });
            });
        </script>

        <style type="text/css">
            #nav {float:right;margin-top:4px;}
            #nav a { color:#373737;font-weight:bold;text-decoration: none; margin: 0 3px; padding: 2px 3px;  }
            #nav a.activeSlide { background: #dddddd }
            #nav a:focus { outline: none; }
        </style>
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
    <body>
        <div id="maincontainer">
            <div id="maincontainer_in">
                <div id="mainwrapper">
                    <div id="topsection">
                        <span class="logo"><a href="index.php"><img src="assets/images/top-logo.png"/></a></span>
                        <ul>
                            <li><a href="index.php">หน้าแรก</a></li>
                            <li><a href="index.php?url=course_index.php">หลักสูตรเรียนขับรถยนต์</a></li>
                            <li><a href="index.php?url=home.php">หลักการสอน</a></li>

                            <li><a href ="index.php?url=Webboard.php">ถาม-ตอบ</a></li>
                            <li><a href="index.php?url=contact.php">ติดต่อ</a></li>
                        </ul>
                    </div>
                    <div id="topslide">
                        <div id="topslide_in">
                            <div class="slideshow" style="height:260px">
                                <a href="#"><img src="assets/images/banner/_banner.jpg" width="940" height="260" /></a>


                            </div>
                            <div id="nav" class="nav"></div>
                        </div>
                    </div>
                    <center><a href="#"><img src="assets/images/contact.png" width="940"/></a></center>
                    <div style="height:5px;clear: left"></div>
                    <script type="text/javascript">
                        $(function() {
                            $('.gallery a').lightBox();
                            $('#div_screenshot a').lightBox();
                            $('.a-gallery a').lightBox();
                        });
                        $(function() {

                        });
                    </script>

                    <style type="text/css">
                        .h2{
                            font-size: 100%;
                            padding:10px 0 2px 0;
                            color:#464646;
                            font-weight: bold;
                        }
                        .p2{
                            text-indent: 40px;
                            font-size: 94%
                        }
                        .a-gallery{
                            font-size: 90%
                        }
                        .gallery{
                            padding-top: 5px;
                        }
                        .gallery img{
                            width: 240px;
                            height: 155px;
                        }
                        .uls{
                            padding:0px;
                            margin: 0px;
                        }
                        .uls li{
                            padding:0px;
                            margin:0px;
                        }
                        .uls li{
                            padding:0px;
                        }
                    </style>
                    <div id="contentwrapper">
                        <div id="contentcolumn2">
                            <div id="student">
                                <div class="top"></div>
                                <div class="content">
                                    <div class="innertube">
                                        <div class="box-content" style="float:left;padding-top:5px">
                                            <?php include($url); ?>                    
                                        </div>
                                    </div>
                                    <div style="clear:left"></div>
                                </div>
                                <div class="bottom"></div>
                            </div>
                        </div>
                    </div>
                    <div id="lefttcolumn">
                        <div><a href="index.php?url=register.php"><img src="assets/images/regis.png" alt=""/></a></div>
                        <div><a href="index.php?url=check.php"><img src="assets/images/check.png" alt=""/></a></div>
                        <div id="ap-inside" style="margin-top:10px">
                            <div class="top"></div>
                            <div class="content">
                                <div id="nav-app">
                                    <ul>
                                        <li><a href="index.php?url=table_index.php">ตารางสอน</a></li>
                                        <li><a href="index.php?url=course_index.php">หลักสูตร</a></li>
                                        <li><a href="index.php?url=home.php">หลักการสอน</a></li>
                                        <li><a href="index.php?url=course_index.php">อัตราการเรียน</a></li>
                                        <li><a href="index.php?url=phase_index.php">ช่วงเวลาเรียน</a></li>
                                        <li><a href="index.php?url=car_index.php">ข้อมูลรถยนต์</a></li>
                                        <li><a href="index.php?url=degree_index.php">สาขาต่างๆ</a></li>
                                        <li><a href="index.php?url=news_index.php">ข่าวสารของโรงเรียน</a></li>
                                        <li><a href="index.php?url=Webboard.php">ถาม - ตอบ</a></li>
                                        <li><a href="index.php?url=step_payment.php">ขั้นตอนและวิธีการชำระเงิน</a></li>
                                        <li><a href="admin/">Login สำหรับเจ้าหน้า</a></li>
                                        <li><a href="login_user.php">Login สำหรับนักเรียน</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="height:5px;clear: left"></div>
                </div>
                <div id="footer">
                    <b>โรงเรียนสอนขับรถยนต์ณัฐชัย</b><br/>
                    สนใจติดต่อ <b>คุณณัฐชัย </b> : 08-9846-4796 | <b>Support</b> : 08-7246-7235<br/>
                    email : 55555@hotmail.com

                </div>
                <div style="padding:20px 0 0px;"></div>
            </div>
        </div>
    </body>
</html>