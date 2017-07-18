<?php
// ดึงข้อมูลมาใส่ ตัวแปร
$rs = mysql_query('SELECT * FROM tbcar');
?>
<img src="assets/images/car.png" alt=""/>
<br/>
<table class="display normal-t" cellspacing="0" cellpadding="0" border="0">
    <thead>
        <tr>
            <th width="50px">คันที่</th>
            <th width ='150'></th>
            <th>ยี่ห้อรถ</th>
           
        </tr>
    </thead>
    <tbody>
        <!-- ดึงข้อมูลมาแสดง -->
        <?php $i = 1;
        while ($val = mysql_fetch_assoc($rs)): ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><img src="admin/myfile/<?=$val["FilesName"];?>" height="150px" width="250px"></td>	
                <td><?php echo $val['name_car']; ?> (<?php echo get_level_car($val['type']); ?>) รุ่น <?php echo $val['version']; ?> สี <?php echo $val['color']; ?>
                 <br/> ทะเบียน <?php echo $val['name_code']; ?>
                </td>				

                
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

