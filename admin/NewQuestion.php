
<?php

if(@$_GET["Action"] == "Save")
{
	//*** Insert Question ***//
	$strSQL = "INSERT INTO webboard ";
	$strSQL .="(CreateDate,Question,Details,Name) ";
	$strSQL .="VALUES ";
	$strSQL .="('".date("Y-m-d H:i:s")."','".$_POST["txtQuestion"]."','".$_POST["txtDetails"]."','".$_POST["txtName"]."') ";
	$objQuery = mysql_query($strSQL);
	
	header("location:index.php?url=Webboard.php");
}
?>
<p class="p2">
<form action="index.php?url=NewQuestion.php&Action=Save" method="post" name="frmMain" id="frmMain">
   <table class="display normal-t" cellspacing="0" cellpadding="0" border="0">
    <tr>
      <td>คำถาม</td>
      <td><input name="txtQuestion" type="text" id="txtQuestion" value="" class="span6"style="width: 350px"></td>
    </tr>
    <tr>
      <td width="78">รายละเอียด</td>
      <td><textarea name="txtDetails" cols="50" style="width: 350px"rows="5" id="txtDetails"></textarea></td>
    </tr>
    <tr>
      <td width="78">ผู้ตั้งคำถาม</td>
      <td width="647"><input name="txtName" type="text" id="txtName" value="" size="50"></td>
    </tr>
    <tr>
        <td></td>
        <td><input name="btnSave" type="submit" class ="btn btn-primary" id="btnSave" value="ตั้งคำถาม"></td>
    </tr>
  </table>
  
  
</form>
</p>