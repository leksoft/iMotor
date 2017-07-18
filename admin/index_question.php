<?php
include_once('../db/connection.php');
include_once('../db/function.php');
?>
<legend>รายการข้อสอบทั้งหมด</legend>
<!-- ปุ่มเพิ่ม -->
<a href="index.php?url=form_question.php" class="btn btn-large btn-info"><i class="icon icon-plus icon-white"></i> เพิ่มข้อสอบ</a>
<br><br>
<?php
@$Act = $_GET['Act'];
switch ($Act) {
    case 'Del' : $QuestionID = $_GET['QuestionID'];
        $Question = $_GET['Question'];
        $delectQuestion = delete("question", "QuestionID='" . $QuestionID . "'");
        if ($delectQuestion) {
            $deleteAnswer = delete("answer", "QuestionID='" . $QuestionID . "'");
            if ($deleteAnswer) {
                echo "<script>";
                echo "alert('ระบบทำการลบ $Question เรียบร้อย');";
                echo "window.location='index.php?url=index_question.php';";
                echo "</script>";
            }
        }
        break;
}
?>
<table class="table table-hover">

    <tr>
        <td width="12%"><div class="center">ลำดับ</div></td>
        <td width="62%"><div class="margin">คำถาม</div></td>
        <td width="15%"><div class="center">แก้ไข</div></td>
        <td width="11%"><div class="center">ลบ</div></td>
    </tr>

<?php
$select = select("question", "1=1");
$no = 0;
while ($que = mysql_fetch_array($select)) {
    $no++;
    ?>
        <tr>
            <td><div class="center"><?= $no; ?></div></td>
            <td><div class="margin"><?php echo $que['Question']; ?></div></td>
            <td><div class="center"><img src="img/Write2.png" class="cusor" onclick="window.location = 'index.php?url=edit_question.php&QuestionID=<?php echo $que['QuestionID']; ?>';" /></div></td>
            <td><div class="center"><img src="img/Trash.png" class="cusor" onclick="window.location = 'index.php?url=index_question.php&Act=Del&QuestionID=<?= $que['QuestionID']; ?>&Question=<?= $que['Question'] ?>';" /></div></td>
        </tr>

<?php } ?>           
</table>