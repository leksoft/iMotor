<?php
// ดึงข้อมูลมาใส่ ตัวแปร
$rs = mysql_query('SELECT * FROM tbdegree');
?>
<img src="assets/images/degree.png" alt=""/>
<br/>
<table class="display normal-t" cellspacing="0" cellpadding="0" border="0">
     <thead>
          <tr>
              
               <th>ชื่อสาขา</th>			
            
          </tr>
     </thead>
     <tbody>
          <!-- ดึงข้อมูลมาแสดง -->
          <?php
          $i = 1;
          while ($val = mysql_fetch_assoc($rs)):
               ?>
               <tr>
                   
                    <td><?php echo $val['name']; ?></td>
                    
               </tr>
          <?php endwhile; ?>
     </tbody>
</table>