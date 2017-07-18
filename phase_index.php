<?php
// ดึงข้อมูลมาใส่ ตัวแปร
$rs = mysql_query('SELECT * FROM tbphase');
?>
<img src="assets/images/phase.png" alt=""/>
<br/>
<table class="display normal-t" cellspacing="0" cellpadding="0" border="0">
    <thead>
        <tr>
            <th width ="50px">ลำดับ</th>
            <th>รอบ</th>	
            <th>ช่วงการเรียน</th>			
            
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
                <td><?php echo $val['around'];?></td>
                <td><?php echo $val['name']; ?></td>        
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>