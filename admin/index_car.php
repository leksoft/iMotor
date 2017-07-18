<?php
// ดึงข้อมูลมาใส่ ตัวแปร
$rs = mysql_query('SELECT * FROM tbcar');
?>
<!-- ปุ่มเพิ่ม -->
<a href="index.php?url=form_car.php" class="btn btn-large btn-info"><i class="icon icon-plus icon-white"></i> เพิ่มข้อมูลรถยนต์</a>
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
            <th width ='150'></th>
            <th>ยี่ห้อรถ</th>
            <th>ทะเบียนรถ</th>
            <th>รุ่น</th>
            <th>สีรถ</th>
            <th>ประเภทเกียร์</th>
            <th>ประเภทรถ</th>
            <th class="text-center" width="50px">แก้ไข</th>
            <th class="text-center" width="50px">ลบ</th>
        </tr>
    </thead>
    <tbody>
        <!-- ดึงข้อมูลมาแสดง -->
        <?php $i = 1;
        while ($val = mysql_fetch_assoc($rs)): ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><img src="myfile/<?=$val["FilesName"];?>" height="150px" width="150px"></td>	
                <td><?php echo $val['name_car']; ?></td>			
                <td><?php echo $val['name_code']; ?></td>	
                <td><?php echo $val['version']; ?></td>	
                <td><?php echo $val['color']; ?></td>
                <td><?php echo get_level_car($val['type']); ?></td>
                <td><?php echo get_level_type_car($val['type_car']); ?></td>
                <td class="text-center"><a href="index.php?url=form_car.php&id=<?php echo $val['id']; ?>"><i class="icon icon-edit"></i></a></td>
                <td class="text-center"><a href="delete_car.php?id=<?php echo $val['id']; ?>" onclick="return confirm('ยืนยันการลบ ?');"><i class="icon icon-trash"></i></a></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>