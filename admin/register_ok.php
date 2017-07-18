<!-- แสดงข้อความการแจ้งเตือน -->
<?php if (isset($_GET['text_alert'])): ?>
	<div class="alert alert-error">
		<?php echo $_GET['text_alert']; ?>
	</div>	
<?php endif ?>

<?php
$id = $_GET['id'];
$rs = "SELECT * FROM tbregister WHERE id = $id ORDER BY id desc";
$query = mysql_query($rs);
$row = mysql_fetch_assoc($query);
?>
<br/>

<div>
    <h2 class="title">ข้อมูลการสมัครของท่าน :</h2> 
   
</div>
<br/>
<table class="display normal-t" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td>ชื่อผู้สมัคร :</td>
        <td><?php echo $row['name']; ?></td>
    </tr>
     <tr>
        <td>ที่อยู่สำหรับการติดต่อ :</td>
        <td><?php echo $row['addr']; ?></td>
    </tr>
     <tr>
        <td>อีเมล์ :</td>
        <td><?php echo $row['email']; ?></td>
    </tr>
    <tr>
        <td>โทร :</td>
        <td><?php echo $row['tel']; ?></td>
    </tr>
     <tr>
        <td>สาขาที่เลือกสมัคร :</td>
        <td><?php echo $row['degree']; ?></td>
    </tr>
     <tr>
        <td>วันที่เรียน :</td>
        <td><?php echo $row['r_day']; ?></td>
    </tr>
     <tr>
        <td> รอบการเรียน :</td>
        <td><?php echo $row['r_time']; ?></td>
    </tr>
     <tr>
        <td> ระบบเกียร์ที่เลือก :</td>
        <td><?php echo $row['r_gear']; ?></td>
    </tr>
    <tr>
        <td>ยี่ห้อรถ :</td>
        <td><?php echo $row['r_car']; ?></td>
    </tr>
     <tr>
        <td>สถานะการชำระเงิน :</td>
        <td><b><?php echo $row['payment']; ?><b/></td>
    </tr>
</table>

<div>
    <h2 class="title">ข้อมูลการเข้าระบบ :</h2> 
   
</div>
<br/>
<table class="display normal-t" cellspacing="0" cellpadding="0" border="0">
    
     <tr>
        <td> ชื่อเข้าใช้ :</td>
        <td><?php echo $row['username']; ?></td>
    </tr>
    <tr>
        <td>รหัสผ่าน :</td>
        <td><?php echo $row['password']; ?></td>
    </tr>
    
</table>