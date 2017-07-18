<img src="assets/images/co_01.png" alt=""/>
<br/>
<img src="assets/images/co_02.png" alt=""/>
<div>
    
<?php 

// ดึงข้อมูลมาใส่ ตัวแปร
$rs = mysql_query('SELECT * FROM tbcourse');
?>

<table class="display normal-t" cellspacing="0" cellpadding="0" border="0">
	<thead>
		<tr>
                         <th width="50px">ลำดับ</th>
			<th>ชื่อหลักสูตร</th>
			<th>เวลาเรียน</th>
			<th>ราคา</th>
			
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
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>
</div>
