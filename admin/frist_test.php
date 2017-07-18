<?php
include('../db/connection.php');
include('../db/function.php');
?>

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
    if ($Bypass['FristPoint'] != 0) {

//        $select = select("article", "1=1 ORDER BY CreateDate DESC LIMIT 1");
//        $art = mysql_fetch_array($select);

        echo "<script>";
        echo "alert('คุณได้ทำแบบทดสอบก่อนเรียนไปแล้ว');";
        echo "window.location='index.php';";
        echo "</script>";
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
                $update = update("tbregister", "FristPoint='" . $Point . "'", "username='" . $_SESSION['username'] . "'");

//                $select = select("article", "1=1 ORDER BY CreateDate DESC LIMIT 1");
//                $art = mysql_fetch_array($select);

                echo "<script>";
                echo "alert('คุณได้คำแนนแบบทดสอบก่อนเรียน $Point คะแนน');";
                echo "window.location='index.php';";
                echo "</script>";

                break;
        }
        ?>

                    <form action="?Act=checkPoint" method="post">
                        <table class="table-full margin">
                            <tr>
                                <td><div class="green">แบบทดสอบก่อนเรียน</div></td>
                            </tr>
                            <tr>
                                <td>

    <?php
    $selectQue = select("question", "1=1 ORDER BY rand() LIMIT 10");
    $no = 0;
    while ($que = mysql_fetch_array($selectQue)) {
        $no++;
        ?>
                                        <table class="table-full margin">
                                            <tr>
                                                <td width="17%" rowspan="2"><div class="no"><?= $no; ?></div></td>
                                                <td width="83%"><b>คำถาม :</b> <?php echo $que['Question']; ?><input type="hidden" name="hdAnswerTrue[]" value="<?= $que['AnswerTrue']; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td>
        <?php
        $noA = 0;
        $selectAns = select("answer", "QuestionID='" . $que['QuestionID'] . "' ORDER BY rand()");
        while ($ans = mysql_fetch_array($selectAns)) {
            $noA++;
            ?>
                                                        <b>คำตอบที่ <?= $noA; ?></b><input type="radio" id="Answer<?= $no; ?>_<?= $noA; ?>" name="Answer<?= $no; ?>" value="<?= $ans['Answer']; ?>" /><? echo $ans['Answer'];?><br>
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