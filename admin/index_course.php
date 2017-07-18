<?php 

// ดึงข้อมูลมาใส่ ตัวแปร
$rs = mysql_query('SELECT * FROM tbcourse');
?>
<!-- ปุ่มเพิ่ม -->
<a href="index.php?url=form_course.php" class="btn btn-large btn-info"><i class="icon icon-plus icon-white"></i> เพิ่มหลักสูตรการเรียน/อัตราการเรียน</a>
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
			<th>ชื่อหลักสูตร</th>
			<th>เวลาเรียน</th>
			<th>ราคา</th>
			<th class="text-center" width="50px">แก้ไข</th>
			<th class="text-center" width="50px">ลบ</th>
		</tr>
	</thead>
	<tbody>
		<!-- ดึงข้อมูลมาแสดง -->
		<?php $i = 1;  while($val = mysql_fetch_assoc($rs)): ?>
		<tr>
                         <td><?php echo $i++;?></td>
			<td><?php echo $val['c_name']; ?> </td>			
			<td><?php echo $val['c_time']; ?> ชม.</td>	
			<td><?php echo $val['c_price']; ?> บาท.</td>	
			<td class="text-center"><a href="index.php?url=form_course.php&id=<?php echo $val['id']; ?>"><i class="icon icon-edit"></i></a></td>
			<td class="text-center"><a href="delete_course.php?id=<?php echo $val['id']; ?>" onclick="return confirm('ยืนยันการลบ ?');"><i class="icon icon-trash"></i></a></td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>