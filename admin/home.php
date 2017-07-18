<?php
@session_start();


$_SESSION['menuName'] = 'หน้าหลัก';
$memberData = $_SESSION['user']['data'];
@$user_id = $memberData['id'];
$name = $memberData['username'];
?>

<?php
// ดึงข้อมูล ระดบัของผู้ใช้งาน
@$level = $_SESSION['user']['data']['type'];
// ระดับ admin
if ($level == 'admin'):
    ?>    
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li><a href="#home" data-toggle="tab">Home</a></li>
        <li><a href="#profile" data-toggle="tab">รายการที่ลงทะเบียน <span class="badge badge-important"></span></a></li>
        <li><a href="#messages" data-toggle="tab">รายการสมาชิกที่แจ้งชำระเงิน <span class="badge badge-important"></span></a></li>
        <li><a href="#settings" data-toggle="tab">เว็บบอร์ด <span class="badge badge-important"></span></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="home">
            <code>
                <h4 class="text-success">ยินดีต้อนรับ "คุณ <?php echo $name; ?>" เข้าสู่ระบบ </h4>	
            </code>
            <hr/>
            <center><img src="../assets/images/pic/car1.jpg" class="img-polaroid"></center>

        </div>
        <div class="tab-pane" id="profile">
            <?php
// ดึงข้อมูลมาใส่ ตัวแปร
            $rs = mysql_query('SELECT * FROM tbregister Where payment ="ชำระเงินแล้ว"');
            ?>

            <!-- แสดงข้อความการแจ้งเตือน -->
            <?php if (isset($_GET['text_alert'])): ?>
                <div class="alert alert-error">
                    <?php echo $_GET['text_alert']; ?>
                </div>	
            <?php endif ?>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="50px">ลำดับ</th>
                        <th>ชื่อ-สกุล</th>
                        <th>หลักสูตรที่เลือก</th>
                        <th>ยอดเงินที่ต้องชำระ</th>
                        <th>เบอร์โทร</th>
                        <th>สถานะการชำระเงิน</th>
                        <th></th>
                        <th class="text-center" width="50px">แก้ไข</th>
                        <th class="text-center" width="50px">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- ดึงข้อมูลมาแสดง -->
                    <?php
                    $i = 1;
                    while ($val = mysql_fetch_assoc($rs)):
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $val['name']; ?></td>
                            <?php
                            $rs_c = mysql_query('SELECT * FROM tbcourse WHERE id = ' . $val['course_id']);
                            while ($val_c = mysql_fetch_assoc($rs_c)):
                                ?>

                                <td><?php echo $val_c['c_name']; ?></td>
                                <td align ='center'><?php echo $val_c['c_price']; ?></td>	
                            <?php endwhile; ?>

                            <td><?php echo $val['tel']; ?></td>	
                            <td><?php echo $val['payment']; ?></td>	
                            <td><?php echo $val['created']; ?></td>
                            <td class="text-center"><a href="index.php?url=form_payment.php&id=<?php echo $val['id']; ?>"><i class="icon icon-edit"></i> จัดการ</a></td>
                            <td class="text-center"><a href="delete_register.php?id=<?php echo $val['id']; ?>" onclick="return confirm('ยืนยันการลบ ?');"><i class="icon icon-trash"></i> ยกเลิก</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <div class="alert alert-error">*** หากสามารถสมัครแล้วยังไม่ทำการชำระเงิน เจ้าหน้าที่จะยกเลิกรายการทันที หากไม่ติดต่อชำระเงินภายใน 7 วัน</div>

        </div>
        <div class="tab-pane" id="messages">
            <?php
// ดึงข้อมูลมาใส่ ตัวแปร
            $rs = mysql_query('SELECT * FROM tbregister Where payment ="ยังไม่ชำระเงิน"');
            ?>

            <!-- แสดงข้อความการแจ้งเตือน -->
            <?php if (isset($_GET['text_alert'])): ?>
                <div class="alert alert-error">
                    <?php echo $_GET['text_alert']; ?>
                </div>	
            <?php endif ?>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="50px">ลำดับ</th>
                        <th>ชื่อ-สกุล</th>
                        <th>หลักสูตรที่เลือก</th>
                        <th>ยอดเงินที่ต้องชำระ</th>
                        <th>เบอร์โทร</th>
                        <th>สถานะการชำระเงิน</th>
                        <th></th>
                        <th class="text-center" width="50px">แก้ไข</th>
                        <th class="text-center" width="50px">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- ดึงข้อมูลมาแสดง -->
                    <?php
                    $i = 1;
                    while ($val = mysql_fetch_assoc($rs)):
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $val['name']; ?></td>			
                            <?php
                            $rs_c = mysql_query('SELECT * FROM tbcourse WHERE id = ' . $val['course_id']);
                            while ($val_c = mysql_fetch_assoc($rs_c)):
                                ?>

                                <td><?php echo $val_c['c_name']; ?></td>
                                <td align ='center'><?php echo $val_c['c_price']; ?></td>	
                            <?php endwhile; ?>
                            <td><?php echo $val['tel']; ?></td>	
                            <td><?php echo $val['payment']; ?></td>	
                            <td><?php echo $val['created']; ?></td>
                            <td class="text-center"><a href="index.php?url=form_payment.php&id=<?php echo $val['id']; ?>"><i class="icon icon-edit"></i> จัดการ</a></td>
                            <td class="text-center"><a href="delete_register.php?id=<?php echo $val['id']; ?>" onclick="return confirm('ยืนยันการลบ ?');"><i class="icon icon-trash"></i> ยกเลิก</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <div class="alert alert-error">*** หากสามารถสมัครแล้วยังไม่ทำการชำระเงิน เจ้าหน้าที่จะยกเลิกรายการทันที หากไม่ติดต่อชำระเงินภายใน 7 วัน</div>
        </div>
        <div class="tab-pane" id="settings">
            <a class="btn btn-danger"href="index.php?url=NewQuestion.php">ตั้งคำถามใหม่</a>
            <hr/>
            <?php
            $strSQL = "SELECT * FROM webboard ";
            $objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysql_num_rows($objQuery);

            $Per_Page = 1000;   // Per Page

            @$Page = $_GET["Page"];
            if (!@$_GET["Page"]) {
                $Page = 1;
            }

            $Prev_Page = $Page - 1;
            $Next_Page = $Page + 1;

            $Page_Start = (($Per_Page * $Page) - $Per_Page);
            if ($Num_Rows <= $Per_Page) {
                $Num_Pages = 1;
            } else if (($Num_Rows % $Per_Page) == 0) {
                $Num_Pages = ($Num_Rows / $Per_Page);
            } else {
                $Num_Pages = ($Num_Rows / $Per_Page) + 1;
                $Num_Pages = (int) $Num_Pages;
            }

            $strSQL .=" order  by QuestionID DESC LIMIT $Page_Start , $Per_Page";
            $objQuery = mysql_query($strSQL);
            ?>
            <table class="table table-hover" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <th width="99"> <div align="center">รหัสคำถาม</div></th>
                <th width="458"> <div align="center">Topic</div></th>
                <th width="90"> <div align="center">ผู้โพส</div></th>
                <th width="130"> <div align="center">วันที่สร้าง</div></th>
                <th width="45"> <div align="center">อ่าน</div></th>
                <th width="47"> <div align="center">ตอบ</div></th>
                </tr>
                <?php
                while ($objResult = mysql_fetch_array($objQuery)) {
                    ?>
                    <tr>
                        <td><div align="center"><?= $objResult["QuestionID"]; ?></div></td>
                        <td><a href="index.php?url=ViewWebboard.php&QuestionID=<?= $objResult["QuestionID"]; ?>"><?= $objResult["Question"]; ?></a></td>
                        <td><?= $objResult["Name"]; ?></td>
                        <td><div align="center"><?= $objResult["CreateDate"]; ?></div></td>
                        <td align="right"><?= $objResult["View"]; ?></td>
                        <td align="right"><?= $objResult["Reply"]; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>

            <br>
            ทั้งหมด <?= $Num_Rows; ?> คำถาม : <?= $Num_Pages; ?> Page :
            <?php
            if ($Prev_Page) {
                echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< ย้อนกลับ</a> ";
            }

            for ($i = 1; $i <= $Num_Pages; $i++) {
                if ($i != $Page) {
                    echo "[ <a href='index.php?Webboard?Page=$i'>$i</a> ]";
                } else {
                    echo "<b> $i </b>";
                }
            }
            if ($Page != $Num_Pages) {
                echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>หน้าต่อไป>></a> ";
            }
            ?>
        </div>
    </div>
<?php elseif ($level == 'manager'): ?>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li><a href="#homet" data-toggle="tab">Home</a></li>
        <li><a href="#profilet" data-toggle="tab">หลักสูตรที่สมัครเรียน <span class="badge badge-important"></span></a></li>
        
        <li><a href="#sumt" data-toggle="tab">ผลการสอบทั้งหมด <span class="badge badge-important"></span></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="homet">
             <code>
                <h4 class="text-success">ยินดีต้อนรับ "คุณ <?php echo $name; ?>" เข้าสู่ระบบ </h4>	
            </code>
            <hr/>
            <center><img src="../assets/images/pic/car1.jpg" class="img-polaroid"></center>

        </div>
         <div class="tab-pane active" id="profilet">
             <?php
// ดึงข้อมูลมาใส่ ตัวแปร
            $rs = mysql_query('SELECT * FROM tbregister ');
            ?>
            <!-- ปุ่มเพิ่ม -->
            <a href="#" class="alert alert-info"><i class="icon icon-plus icon-white"></i> รายการที่ลงทะเบียนเรียนทั้งหมด</a>
            <br><br>
            <!-- แสดงข้อความการแจ้งเตือน -->
            <?php if (isset($_GET['text_alert'])): ?>
                <div class="alert alert-error">
                    <?php echo $_GET['text_alert']; ?>
                </div>	
            <?php endif ?>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="50px">ลำดับ</th>
                        <th>ชื่อ-สกุล</th>
                        <th>เบอร์โทร</th>
                        <th>ระดับ</th>
                        <th>สถานะการชำระเงิน</th>
                        <th></th>
                        <th class="text-center" width="50px">แก้ไข</th>
                        <th class="text-center" width="50px">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- ดึงข้อมูลมาแสดง -->
                    <?php
                    $i = 1;
                    while ($val = mysql_fetch_assoc($rs)):
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $val['name']; ?></td>			
                            <td><?php echo $val['tel']; ?></td>	
                            <td><?php echo $val['email']; ?></td>	
                            <td><?php echo $val['payment']; ?></td>	
                            <td><?php echo $val['created']; ?></td>
                            <td class="text-center"><a href="index.php?url=form_payment.php&id=<?php echo $val['id']; ?>"><i class="icon icon-edit"></i> จัดการ</a></td>
                            <td class="text-center"><a href="delete_register.php?id=<?php echo $val['id']; ?>" onclick="return confirm('ยืนยันการลบ ?');"><i class="icon icon-trash"></i> ยกเลิก</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <div class="alert alert-error">*** หากสามารถสมัครแล้วยังไม่ทำการชำระเงิน เจ้าหน้าที่จะยกเลิกรายการทันที หากไม่ติดต่อชำระเงินภายใน 7 วัน</div>

        </div>
        <div class="tab-pane" id="sumt">
            <legend>ผลคะแนนการสอบท้งหมด</legend>
            <table class="table">

                <tr>
<td><div class="center">ชื่อ - สกุล</div></td>
                    <td><div class="center">คะแนนก่อนสอบ</div></td>
                    <td><div class="center">คะแนนหลังสอบ</div></td>
                    <td>รวมทั้งหมด</td>
                </tr>

                <?php
                $no = 0;
                $select = mysql_query('select * from tbregister');
                while ($ran = mysql_fetch_array($select)) {
                    $no++;
                    ?>
                    <tr>
<td><div class="center"><?php echo $ran['name']; ?></div></td>
                        <td><div class="center"><?php echo $ran['FristPoint']; ?></div></td>
                        <td><div class="center"><?php echo $ran['EndPoint']; ?></div></td>
                        <td><div class="center"><?php echo $ran['EndPoint'] + $ran['FristPoint']; ?></div></td>
                    </tr>

                <?php } ?>
            </table>		
        </div>
<?php elseif ($level == 'user'): ?>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li><a href="#home" data-toggle="tab">Home</a></li>
        <li><a href="#profile" data-toggle="tab">หลักสูตรที่สมัครเรียน <span class="badge badge-important"></span></a></li>
        <li><a href="#frist" data-toggle="tab">แบบทดสอบก่อนเรียน <span class="badge badge-important"></span></a></li>
        <li><a href="#end" data-toggle="tab">แบบทดสอบหลังเรียน <span class="badge badge-important"></span></a></li>
        <li><a href="#sum" data-toggle="tab">ผลการสอบทั้งหมด <span class="badge badge-important"></span></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="home">
            <code>
                <h4 class="text-success">ยินดีต้อนรับ "คุณ <?php echo $name; ?>" เข้าสู่ระบบ </h4>	
            </code>
            <hr/>
            <center><img src="../assets/images/pic/car1.jpg" class="img-polaroid"></center>

        </div>
        <div class="tab-pane" id="profile">
            <?php
// ดึงข้อมูลมาใส่ ตัวแปร
            $rs = mysql_query('SELECT * FROM tbregister WHERE id = ' . $user_id);
            ?>
            <!-- ปุ่มเพิ่ม -->
            <a href="#" class="alert alert-info"><i class="icon icon-plus icon-white"></i> รายการที่ลงทะเบียนเรียนทั้งหมด</a>
            <br><br>
            <!-- แสดงข้อความการแจ้งเตือน -->
            <?php if (isset($_GET['text_alert'])): ?>
                <div class="alert alert-error">
                    <?php echo $_GET['text_alert']; ?>
                </div>	
            <?php endif ?>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="50px">ลำดับ</th>
                        <th>ชื่อ-สกุล</th>
                        <th>เบอร์โทร</th>
                        <th>ระดับ</th>
                        <th>สถานะการชำระเงิน</th>
                        <th></th>
                        <th class="text-center" width="50px">แก้ไข</th>
                        <th class="text-center" width="50px">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- ดึงข้อมูลมาแสดง -->
                    <?php
                    $i = 1;
                    while ($val = mysql_fetch_assoc($rs)):
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $val['name']; ?></td>			
                            <td><?php echo $val['tel']; ?></td>	
                            <td><?php echo $val['email']; ?></td>	
                            <td><?php echo $val['payment']; ?></td>	
                            <td><?php echo $val['created']; ?></td>
                            <td class="text-center"><a href="index.php?url=form_payment.php&id=<?php echo $val['id']; ?>"><i class="icon icon-edit"></i> จัดการ</a></td>
                            <td class="text-center"><a href="delete_register.php?id=<?php echo $val['id']; ?>" onclick="return confirm('ยืนยันการลบ ?');"><i class="icon icon-trash"></i> ยกเลิก</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <div class="alert alert-error">*** หากสามารถสมัครแล้วยังไม่ทำการชำระเงิน เจ้าหน้าที่จะยกเลิกรายการทันที หากไม่ติดต่อชำระเงินภายใน 7 วัน</div>

        </div>
        <div class="tab-pane" id="end">

            <script>
                function checkVal() {
                    for (i = 1; i <= 10; i++) {
                        var rdo1 = document.getElementById('Answer' + i + '_1').checked;
                        var rdo2 = document.getElementById('Answer' + i + '_2').checked;
                        var rdo3 = document.getElementById('Answer' + i + '_3').checked;
                        var rdo4 = document.getElementById('Answer' + i + '_4').checked;
                        if (rdo1 == false && rdo2 == false && rdo3 == false && rdo4 == false) {
                            alert('คุณยังไม่ได้เลือกคำตอบที่ ' + i);
                            return false;
                        }
                    }
                }
            </script>

            <?php
            $selectPoint = select("tbregister", "username='" . $name . "'");
            $Bypass = mysql_fetch_array($selectPoint);
            if ($Bypass['EndPoint'] != 0) {

//        $select = select("article", "1=1 ORDER BY CreateDate DESC LIMIT 1");
//        $art = mysql_fetch_array($select);

                echo "<div class ='alert'>";
                echo "คุณได้ทำแบบทดสอบหลังเรียนไปแล้ว คะแนนที่คุณสอบได้คือ " . $Bypass['EndPoint'] . " คะแนน";
                echo "</div>";
            } else {
                @$Act = $_GET['Act_end'];
                switch ($Act) {
                    case 'checkPoint' : $AnswerTrue = $_POST['hdAnswerTrue'];
                        for ($i = 1; $i <= 10; $i++) {
                            $Answer[] = $_POST['Answer' . $i];
                        }

                        $Point = 0;
                        for ($i = 0; $i < count($Answer); $i++) {
                            if ($Answer[$i] == $AnswerTrue[$i]) {
                                $Point = $Point + 1;
                            }
                        }

                        $FristTest = $Point;
                        $update = update("tbregister", "EndPoint='" . $Point . "'", "username='" . $name . "'");

//                $select = select("article", "1=1 ORDER BY CreateDate DESC LIMIT 1");
//                $art = mysql_fetch_array($select);

                        echo "<script>";
                        echo "alert('คุณได้คำแนนแบบทดสอบหลังเรียนเรียน $Point คะแนน');";
                        echo "window.location='index.php';";
                        echo "</script>";

                        break;
                }
                ?>

                <form action="index.php?url=home.php&Act_end=checkPoint" method="post">
                    <table class="table">

                        <tr>
                            <td>

                                <?php
                                $selectQue = select("question", "1=1 ORDER BY rand() LIMIT 40");
                                $no = 0;
                                while ($que = mysql_fetch_array($selectQue)) {
                                    $no++;
                                    ?>
                                    <table class="table-full margin">
                                        <tr>
                                            <td rowspan="2"><div class="no"><?= $no; ?></div></td>
                                            <td><b></b> <?php echo $que['Question']; ?><input type="hidden" name="hdAnswerTrue[]" value="<?= $que['AnswerTrue']; ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php
                                                $noA = 0;
                                                $selectAns = select("answer", "QuestionID='" . $que['QuestionID'] . "' ORDER BY rand()");
                                                while ($ans = mysql_fetch_array($selectAns)) {
                                                    $noA++;
                                                    ?>
                                                    <b><?= $noA; ?> </b><input type="radio" id="Answer<?= $no; ?>_<?= $noA; ?>" name="Answer<?= $no; ?>" value="<?= $ans['Answer']; ?>" />  <?php echo $ans['Answer']; ?><br>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><div class="line"></div></td>
                                        </tr>
                                    </table>
                                <?php } ?>     

                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="ส่งคำตอบ" onclick="return checkVal();" /></td>
                        </tr>
                    </table>
                </form>
            <?php } ?>

        </div>
        <div class="tab-pane" id="frist">

            <script>
                function checkVal() {
                    for (i = 1; i <= 10; i++) {
                        var rdo1 = document.getElementById('Answer' + i + '_1').checked;
                        var rdo2 = document.getElementById('Answer' + i + '_2').checked;
                        var rdo3 = document.getElementById('Answer' + i + '_3').checked;
                        var rdo4 = document.getElementById('Answer' + i + '_4').checked;
                        if (rdo1 == false && rdo2 == false && rdo3 == false && rdo4 == false) {
                            alert('คุณยังไม่ได้เลือกคำตอบที่ ' + i);
                            return false;
                        }
                    }
                }
            </script>

            <?php
            $selectPoint = select("tbregister", "username='" . $name . "'");
            $Bypass = mysql_fetch_array($selectPoint);
            if ($Bypass['FristPoint'] != 0) {

//        $select = select("article", "1=1 ORDER BY CreateDate DESC LIMIT 1");
//        $art = mysql_fetch_array($select);

                echo "<div class ='alert'>";
                echo "คุณได้ทำแบบทดสอบก่อนเรียนไปแล้ว คะแนนที่คุณสอบได้คือ " . $Bypass['FristPoint'] . " คะแนน";
                echo "</div>";
            } else {
                @$Act = $_GET['Act'];
                switch ($Act) {
                    case 'checkPoint' : $AnswerTrue = $_POST['hdAnswerTrue'];
                        for ($i = 1; $i <= 10; $i++) {
                            $Answer[] = $_POST['Answer' . $i];
                        }

                        $Point = 0;
                        for ($i = 0; $i < count($Answer); $i++) {
                            if ($Answer[$i] == $AnswerTrue[$i]) {
                                $Point = $Point + 1;
                            }
                        }

                        $FristTest = $Point;
                        $update = update("tbregister", "FristPoint='" . $Point . "'", "username='" . $name . "'");

//                $select = select("article", "1=1 ORDER BY CreateDate DESC LIMIT 1");
//                $art = mysql_fetch_array($select);

                        echo "<script>";
                        echo "alert('คุณได้คำแนนแบบทดสอบก่อนเรียน $Point คะแนน');";
                        echo "window.location='index.php';";
                        echo "</script>";

                        break;
                }
                ?>

                <form action="index.php?url=home.php&Act=checkPoint" method="post">
                    <table class="table">

                        <tr>
                            <td>

                                <?php
                                $selectQue = select("question", "1=1 ORDER BY rand() LIMIT 40");
                                $no = 0;
                                while ($que = mysql_fetch_array($selectQue)) {
                                    $no++;
                                    ?>
                                    <table class="table-full margin">
                                        <tr>
                                            <td rowspan="2"><div class="no"><?= $no; ?></div></td>
                                            <td><b></b> <?php echo $que['Question']; ?><input type="hidden" name="hdAnswerTrue[]" value="<?= $que['AnswerTrue']; ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php
                                                $noA = 0;
                                                $selectAns = select("answer", "QuestionID='" . $que['QuestionID'] . "' ORDER BY rand()");
                                                while ($ans = mysql_fetch_array($selectAns)) {
                                                    $noA++;
                                                    ?>
                                                    <b><?= $noA; ?> </b><input type="radio" id="Answer<?= $no; ?>_<?= $noA; ?>" name="Answer<?= $no; ?>" value="<?= $ans['Answer']; ?>" />  <?php echo $ans['Answer']; ?><br>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><div class="line"></div></td>
                                        </tr>
                                    </table>
                                <?php } ?>     

                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="ส่งคำตอบ" onclick="return checkVal();" /></td>
                        </tr>
                    </table>
                </form>
            <?php } ?>
        </div>
        <div class="tab-pane" id="sum">
            <legend>ผลคะแนนการสอบท้งหมด</legend>
            <table class="table">

                <tr>

                    <td><div class="center">คะแนนก่อนสอบ</div></td>
                    <td><div class="center">คะแนนหลังสอบ</div></td>
                    <td>รวมทั้งหมด</td>
                </tr>

                <?php
                $no = 0;
                $select = select("tbregister", "username='" . $name . "'");
                while ($ran = mysql_fetch_array($select)) {
                    $no++;
                    ?>
                    <tr>

                        <td><div class="center"><?php echo $ran['FristPoint']; ?></div></td>
                        <td><div class="center"><?php echo $ran['EndPoint']; ?></div></td>
                        <td><div class="center"><?php echo $ran['EndPoint'] + $ran['FristPoint']; ?></div></td>
                    </tr>

                <?php } ?>
            </table>		
        </div>
    </div>


<?php endif; ?>
