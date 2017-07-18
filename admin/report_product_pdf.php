<?php
require_once 'db/connection.php';
require_once 'mpdf/mpdf.php';
// ดึงข้อมูลมาใส่ ตัวแปร
$rs = mysql_query('SELECT *,(SELECT product_type_name FROM tbproduct_type WHERE id = tbproduct.product_type_id) product_type_name FROM tbproduct');


$tbl = "<legend>รายงานสินค้า</legend><br><br>";

$tbl .="<table class='table' border ='1' width ='640px'>";
$tbl .="<thead>";
$tbl .="<tr>";
$tbl .="<th>ลำดับ</th>";
$tbl .="<th >ชื่อสินค้า</th>";
$tbl .="<th>ประเภท</th>";
$tbl .="<td>จำนวน</td>";
$tbl .="</tr>";
$tbl .="</thead>";
$tbl .="<tbody>";

$i = 1;
while ($val = mysql_fetch_array($rs)):

    $tbl .="<tr>";
    $tbl .="<td>" . $i++ . "</td>";
    $tbl .="<td>" . $val['product_name'] . "</td>";
    $tbl .="<td>" . $val['product_type_name'] . "</td>";

    $tbl .="<td width='50px' class='text-center'>" . $val['amount'] . "</td>";

    $tbl .="</tr>";
endwhile;
$tbl .="</tbody>";
$tbl .="</table>";

$mpdf = new mPDF('th');
$mpdf->WriteHTML($tbl);
$mpdf->Output();
?>