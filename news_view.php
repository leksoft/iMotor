
<?php
$id = $_GET['id'];
$rs = "SELECT * FROM tbnews WHERE id =$id";
$query = mysql_query($rs);
$row = mysql_fetch_assoc($query);
?>

<h2 class="title"><?php echo $row['news_name'];?></h2>
<BR/>
<div>
    <b><?php echo $row['news_detail']; ?><br/>
   
</div>
