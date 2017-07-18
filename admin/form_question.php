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
@$Act = $_GET['Act'];
switch ($Act) {
    case 'Add' : $Question = $_POST['txtQuestion'];
        $Answer = $_POST['txtAnswer'];
        $AnswerTrue = $_POST['txtAnswerTrue'];
        $insertQuestion = insert("question", "Question,AnswerTrue", "'" . $Question . "','" . $AnswerTrue . "'");
        if ($insertQuestion) {
            $QuestionID = mysql_insert_id();
            for ($i = 0; $i < 4; $i++) {
                $insertAnswer = insert("answer", "QuestionID,Answer", "'" . $QuestionID . "','" . $Answer[$i] . "'");
            }
            echo "<script>";
            echo "alert('ระบบทำการเพิ่มคำถาม $Question เรียบร้อย');";
            echo "window.location='index.php?url=index_question.php';";
            echo "</script>";
        }
        break;
}
?>
<legend>เพิ่มแบบทดสอบ</legend>
<form action="index.php?url=form_question.php&Act=Add" method="post">  
    <table class="table">
        <tr>
            <td>เลือกประเภทแบบทดสอบ</td>
            <td><input type="text" id="txtQuestion" class="txtboxl"  style="width: 450px;"name="txtQuestion" value="" /></td>
        </tr>
        <tr>
            <td>คำถาม</td>
            <td><input type="text" id="txtQuestion" class="txtboxl"  style="width: 450px;"name="txtQuestion" value="" /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <?php for ($i = 1; $i <= 4; $i++) { ?>
                    คำตอบที่ <?= $i; ?>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <input type='text' id='txtAnswer<?= $i; ?>' class="txtbox" name='txtAnswer[]' value=''><br>	
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>คำตอบที่ถูกต้อง</td>
            <td width="63%"><input type="text" id="txtAnswerTrue" class="txtbox" name="txtAnswerTrue" value="" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" class="btn btn-info" value="เพิ่มคำถาม" onclick="return checkVal();" />
                <input type="reset" class="btn btn-danger" value="ล้างข้อมูล" /></td>

        </tr>

    </table> 
</form>   		