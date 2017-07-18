<?php
$memberData = $_SESSION['user']['data'];
$user_id  = $memberData['id'];
$name = $memberData['fname']." ".$memberData['lname'];
$email = $memberData['email'];
?>
<legend>รายการที่ท่านต้องการเบิก</legend>
<table class="table table-striped">
  <tr>
    <td width="101">รหัสสินค้า</td>
    <td width="82">รายการสินค้า</td>
    <td width="79">จำนวนที่เบิก</td>
    
  </tr>
  <?php
  $Total = 0;
  $SumTotal = 0;

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
		$strSQL = "SELECT *,(SELECT product_type_name FROM tbproduct_type WHERE id = tbproduct.product_type_id) product_type_name FROM tbproduct WHERE id = '".$_SESSION["strProductID"][$i]."' ";
		$objQuery = mysql_query($strSQL)  or die(mysql_error());
		$objResult = mysql_fetch_array($objQuery);
		$Total = $_SESSION["strQty"][$i];
		$SumTotal = $SumTotal + $Total;
	  ?>
	  <tr>
		<td><?=$_SESSION["strProductID"][$i];?></td>
		<td><?=$objResult["product_name"];?></td>
		<td><?=$_SESSION["strQty"][$i];?></td>
	  </tr>
	  <?php
	  }
  }
  ?>
</table>
<div class ="alert alert-danger">** หากท่านต้องการเบิกสินค้าเพิ่มให้กดปุ่ม ขอเบิกสินค้าต่อ</div>
<br><br><a  class="btn btn-success"href="index.php?url=index_widen.php">ขอเบิกสินค้าเพิ่มอีก</a>


<legend>รายละเอียดผู้ทำรายการเบิก</legend>
<form name="form1" method="post" action="save_checkout.php">
    <table class="table" border="1">
    <tr>
      <td width="71">รหัสผู้เบิก</td>
      <td width="217"><input type="text" disabled="true"name="user_id" value="<?php echo $user_id;?>"></td>
    </tr>
    <tr>
      <td>ชื่อ - สกุล</td>
      <td><input type="text" disabled="true"name="name" value="<?php echo $name;?>"></td>
    </tr>
    <tr>
        <td>วันที่ทำรายการ</td>
      <td><input type='text' id='date' name='date' style="width:80px" value="" class="required"/>
                    <span class="btn" type="button" id="cal_rdate" tabindex="-1"><i class="icon-calendar"></i></span>
                    <script type="text/javascript">
                         Calendar.setup({
                              inputField: "date",
                              button: "cal_rdate",
                              ifFormat: "%d/%m/%Y"
                         });
                    </script></td>
    </tr>
    
  </table>
     <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type="submit" name="Submit" value="บันทึกรายการเบิก">
</form>
