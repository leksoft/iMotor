


    <?php
$rs = "SELECT * FROM tbconfig WHERE id ='1'";
$query = mysql_query($rs);
$row = mysql_fetch_assoc($query);
?>
    <p class="title"><?php echo $row['name'];?></p>
<hr/><br/>
<span style='border-bottom:#000 1px dashed'><?php echo $row['detail']; ?></span>



