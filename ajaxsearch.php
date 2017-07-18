<?php
include_once('db/connection.php');
include_once('db/function.php');

$strSearch = $_POST["mySearch"];
if ($strSearch != '') {
    $strSQL = "SELECT * FROM tbregister WHERE email LIKE '%" . $strSearch . "%'";
    $objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
    ?>
    <table class="table table-hover table-striped table-bordered">
        <tr>
            <th width="191"> <div align="center">สถานะการสมัคร</div></th>
    <th width="198"> <div align="center">ชื่อ</div></th>

    </tr>
    <?php
    while ($objResult = mysql_fetch_array($objQuery)) {
        ?>
        <tr>
            <td><div align="center"><?= $objResult["payment"]; ?></div></td>
            <td><div align="center"><?= $objResult["name"]; ?></div></td>
            <td class="">
                <?php if($objResult["payment"]!="ชำระเงินแล้ว"){ ?>
                <a href="index.php?url=payment.php&id=<?php echo $objResult['id']; ?>"><i class="icon icon-edit"></i> แจ้งชำระเงิน</a>
                <?php } ?>
            </td>

        </tr>
        <?php
    }
}
?>
</table>
