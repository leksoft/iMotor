<?php
include_once('../db/connection.php');
include_once('../db/function.php');
?>
<script>
    function checkVal() {
        if (document.getElementById('txtQuestion').value == '') {
            alert('กรุณากรอกคำถาม');
            document.getElementById('txtQuestion').focus();
            return false;
        }

        for (i = 1; i <= 4; i++) {
            if (document.getElementById('txtAnswer' + i).value == '') {
                alert('กรุณากรอกคำตอบที่' + i);
                document.getElementById('txtAnswer' + i).focus();
                return false;
                break;
            }
        }

        if (document.getElementById('txtAnswerTrue').value == '') {
            alert('กรุณากรอกคำตอบที่ถูกต้อง');
            document.getElementById('txtAnswerTrue').focus();
            return false;
        } else {
            var permiss = 0;
            for (i = 1; i <= 4; i++) {
                if (document.getElementById('txtAnswerTrue').value == document.getElementById('txtAnswer' + i).value) {
                    permiss = 1;
                    break;
                }
            }
            if (permiss == 0) {
                alert('คำตอบไม่เหมือนกันกรุณากรอกใหม่');
                document.getElementById('txtAnswerTrue').focus();
                return false;
            }
        }
    }
</script>
<?php
$QuestionID = $_GET['QuestionID'];
$select = select("question", "QuestionID='" . $QuestionID . "'");
$que = mysql_fetch_array($select);

@$Act = $_GET['Act'];
switch ($Act) {
    case 'Update' : $QuestionID = $_GET['QuestionID'];
        $Question = $_POST['txtQuestion'];
        $AnswerID = $_POST['hdAnswerID'];
        $Answer = $_POST['txtAnswer'];
        $AnwerTrue = $_POST['txtAnswerTrue'];

        $updateQuestion = update("question", "Question='" . $Question . "',AnswerTrue='" . $AnwerTrue . "'", "QuestionID='" . $QuestionID . "'");
        if ($updateQuestion) {
            for ($i = 0; $i < count($AnswerID); $i++) {
                $updateAnswer = update("answer", "Answer='" . $Answer[$i] . "'", "AnswerID='" . $AnswerID[$i] . "'");
            }
            echo "<script>";
            echo "alert('ระบบทำกการแก้ไข $Question เรียบร้อย');";
            echo "window.location='index.php?url=index_question.php';";
            echo "</script>";
        }
        break;
}
?>
<div id="warp">
    <div id="header"></div>
    <div id="clear"></div>
    <div id="container">
        <div id="container-left">
            <form action="index.php?url=edit_question.php&Act=Update&QuestionID=<?= $QuestionID; ?>" method="post">  
                <table class="table-full margin">
                    <tr>
                        <td colspan="4"><div class="title green">เพิ่มคำถาม</div></td>
                    </tr>
                    <tr>
                        <td width="15%">คำถาม</td>
                        <td colspan="3"><input type="text" id="txtQuestion" class="txtboxl" name="txtQuestion" value="<?= $que['Question']; ?>" /></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <?php
                            $selectAns = select("answer", "QuestionID='" . $QuestionID . "'");
                            $i = 0;
                            while ($ans = mysql_fetch_array($selectAns)) {
                                $i++;
                                ?>  คำตอบที่ <?= $i; ?>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                <input type="hidden" name="hdAnswerID[]" value="<?= $ans['AnswerID']; ?>" />
                                <input type="text" id="txtAnswer<?= $i ?>" class="txtbox" name="txtAnswer[]" value="<?= $ans['Answer']; ?>"><br>	
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>คำตอบที่ถูกต้อง</td>
                        <td width="63%"><input type="text" id="txtAnswerTrue" class="txtbox" name="txtAnswerTrue" value="<?= $que['AnswerTrue']; ?>" /></td>
                        <td width="5%">&nbsp;</td>
                        <td width="17%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" class="btngreen" value="แก้ไขคำถาม" onclick="return checkVal();" /><input type="reset" class="btnred" value="ล้างข้อมูล" /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                </table> 
            </form>  		
