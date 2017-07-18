<?php
// ดึงข้อมูลมาใส่ ตัวแปร
$rs = mysql_query('SELECT * FROM tbdegree');
?>
<!-- ปุ่มเพิ่ม -->
<a href="index.php?url=form_degree.php" class="btn btn-large btn-info"><i class="icon icon-plus icon-white"></i> เพิ่มสาขาต่างๆ</a>
<br><br>
<!-- แสดงข้อความการแจ้งเตือน -->
<?php if (isset($_GET['text_alert'])): ?>
     <div class="alert alert-error">
          <?php echo $_GET['text_alert']; ?>
     </div>	
<?php endif ?>
<table class="table table-hover table-striped table-bordered">
     <thead>
          <tr>
               <th width ="50px">ลำดับ</th>
               <th>ชื่อสาขา</th>			
               <th class="text-center" width="50px">แก้ไข</th>
               <th class="text-center" width="50px">ลบ</th>
          </tr>
     </thead>
     <tbody>
          <!-- ดึงข้อมูลมาแสดง -->
          <?php
          $i = 1;
          while ($val = mysql_fetch_assoc($rs)):
               ?>
               <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $val['name']; ?></td>
                    <td class="text-center"><a href="index.php?url=form_degree.php&id=<?php echo $val['id']; ?>"><i class="icon icon-edit"></i></a></td>
                    <td class="text-center"><a href="delete_degree.php?id=<?php echo $val['id']; ?>" onclick="return confirm('ยืนยันการลบ ?');"><i class="icon icon-trash"></i></a></td>
               </tr>
          <?php endwhile; ?>
     </tbody>
</table>