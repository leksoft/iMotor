<?php

if(@$_GET["Action"] == "Save")
{
	//*** Insert Reply ***//
	$strSQL = "INSERT INTO reply ";
	$strSQL .="(QuestionID,CreateDate,Details,Name) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_GET["QuestionID"]."','".date("Y-m-d H:i:s")."','".$_POST["txtDetails"]."','".$_POST["txtName"]."') ";
	$objQuery = mysql_query($strSQL);
	
	//*** Update Reply ***//
	$strSQL = "UPDATE webboard ";
	$strSQL .="SET Reply = Reply + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
	$objQuery = mysql_query($strSQL);	
}
?>

<?php
//*** Select Question ***//
$strSQL = "SELECT * FROM webboard  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$objResult = mysql_fetch_array($objQuery);

//*** Update View ***//
$strSQL = "UPDATE webboard ";
$strSQL .="SET View = View + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$objQuery = mysql_query($strSQL);	
?>
   <table class="display normal-t" cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td colspan="2"><center><h4><?=$objResult["Question"];?></h4></center></td>
  </tr>
  <tr>
    <td height="53" colspan="2"><?=nl2br($objResult["Details"]);?></td>
  </tr>
  <tr>
    <td width="397">ผู้โพสต์ : <?=$objResult["Name"];?> วันที่โพสต์ : <?=$objResult["CreateDate"];?></td>
    <td width="253">อ่าน : <?=$objResult["View"];?> ตอบ : <?=$objResult["Reply"];?></td>
  </tr>
</table>
<br>
<br>
<?php
$intRows = 0;
$strSQL2 = "SELECT * FROM reply  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL."]");
while($objResult2 = mysql_fetch_array($objQuery2))
{
	$intRows++;
?> No : <?=$intRows;?>
   <table class="display normal-t" cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td height="53" colspan="2"><?=nl2br($objResult2["Details"]);?></td>
  </tr>
  <tr>
    <td width="397">ผู้ตอบ :
        <?=$objResult2["Name"];?>      </td>
    <td width="253">วันที่โพสต์ตอบ :
    <?=$objResult2["CreateDate"];?></td>
  </tr>
</table><br>
<?php
}
?>
<br>
<a href="">ตอบกระทู้</a> |<a href="index.php?url=Webboard.php">กลับ</a> <br>
<br>
<form action="index.php?url=ViewWebboard.php&QuestionID=<?=$_GET["QuestionID"];?>&Action=Save" method="post" name="frmMain" id="frmMain">
    <table class="display normal-t" cellspacing="0" cellpadding="0" border="0">
    <tr>
      <td width="78">รายละเอียด</td>
      <td><textarea name="txtDetails" cols="50" rows="5" id="txtDetails"></textarea></td>
    </tr>
    <tr>
      <td width="78">ผู้ตอบ</td>
      <td width="647"><input name="txtName" type="text" id="txtName" value="" size="50"></td>
    </tr>
    <tr>
        <td></td>
        <td><input name="btnSave" class ="btn btn-primary"type="submit" id="btnSave" value="ตอบกระทู้"></td>
    </tr>
  </table>
  
  
</form>
