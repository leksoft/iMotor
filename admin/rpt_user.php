<?php 

// ดึงข้อมูลมาใส่ ตัวแปร
$rs = mysql_query('SELECT * FROM tbregister ');
?>
<!-- ปุ่มเพิ่ม -->
<legend>รายงานข้อมูลสมาชิกทั้งหมด</legend>
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
			
		</tr>
	</thead>
	<tbody>
		<!-- ดึงข้อมูลมาแสดง -->
		<?php $i = 1;  while($val = mysql_fetch_assoc($rs)): ?>
		<tr>
                         <td><?php echo $i++;?></td>
			<td><?php echo $val['name'];?></td>			
			<td><?php echo $val['tel']; ?></td>	
			<td><?php echo $val['email']; ?></td>	
                        
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>
<h4 class="alert alert-info">สมาชิกทั้งหมด มี <?php echo $num = mysql_num_rows($rs);?> คน</h4>