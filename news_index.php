
<img src="assets/images/news.png" alt=""/>
<br/>
<table class="table table-striped table-bordered">
  <?php $rsnews = mysql_query("select * from tbnews"); ?>

    <tbody>
        <?php while ($r_news1 = mysql_fetch_array($rsnews)): ?>
            <tr>
                <td width ="150"><?php echo $r_news1['date']; ?></td>
                <td><a href ="index.php?url=news_view.php&id=<?php echo $r_news1['id']; ?>"><?php echo $r_news1["news_name"]; ?></a></td>

            </tr>
        <?php endwhile ?>
    </tbody>
</table>	


