<a class="btn btn-danger"href="index.php?url=NewQuestion.php">ตั้งคำถามใหม่</a>
<hr/>
<?php

$strSQL = "SELECT * FROM webboard ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);

$Per_Page = 1000;   // Per Page

@$Page = $_GET["Page"];
if(!@$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}

$strSQL .=" order  by QuestionID DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>
<table class="display normal-t" cellspacing="0" cellpadding="0" border="0">
  <tr>
    <th width="99"> <div align="center">รหัสคำถาม</div></th>
    <th width="458"> <div align="center">Topic</div></th>
    <th width="90"> <div align="center">ผู้โพส</div></th>
    <th width="130"> <div align="center">วันที่สร้าง</div></th>
    <th width="45"> <div align="center">อ่าน</div></th>
    <th width="47"> <div align="center">ตอบ</div></th>
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?=$objResult["QuestionID"];?></div></td>
    <td><a href="index.php?url=ViewWebboard.php&QuestionID=<?=$objResult["QuestionID"];?>"><?=$objResult["Question"];?></a></td>
    <td><?=$objResult["Name"];?></td>
    <td><div align="center"><?=$objResult["CreateDate"];?></div></td>
    <td align="right"><?=$objResult["View"];?></td>
    <td align="right"><?=$objResult["Reply"];?></td>
  </tr>
<?php
}
?>
</table>

<br>
ทั้งหมด <?= $Num_Rows;?> คำถาม : <?=$Num_Pages;?> Page :
<?php
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< ย้อนกลับ</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='index.php?Webboard?Page=$i'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>หน้าต่อไป>></a> ";
}

?>