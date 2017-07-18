
<?php 
// รับ id ใช้ในกรณี แสดงข้อมูลด้วยปุ่มแก้ไข
@$id = $_GET['id'];
// ตรวจสอบค่า id
if(!empty($id)){
	// กรณี id มีข้อมูลส่งมา
	// จะทำการดึงข้อมูลออกมาแสดง
	$rs = mysql_query('SELECT * FROM tbnews WHERE id = '.$id);
	// นำข้อมูลมาเก็บใส่ตัวแปร
	$val = mysql_fetch_assoc($rs);
}

?>
<script type="text/javascript" src="../assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shCore.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushBash.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushCpp.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushCSharp.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushCss.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushDelphi.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushDiff.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushGroovy.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushJava.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushJScript.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushPhp.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushPlain.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushPython.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushRuby.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushScala.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushSql.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushVb.js"></script>
<script type="text/javascript" src="../assets/ckeditor/plugins/syntaxhighlight/scripts/shBrushXml.js"></script>
<link type="text/css" rel="stylesheet" href="../assets/ckeditor/plugins/syntaxhighlight/styles/shCore.css"/>
<link type="text/css" rel="stylesheet" href="../assets/ckeditor/plugins/syntaxhighlight/styles/shThemeDefault.css"/>
<script type="text/javascript">
            SyntaxHighlighter.config.clipboardSwf = '../assets/ckeditor/plugins/syntaxhighlight/scripts/clipboard.swf';
            SyntaxHighlighter.all();</script>
<div style="margin-top:30px;">
<!-- form สำหรับการเพิ่มข้อมูล และ แก้ไขผู้ใช้งาน -->
<legend>จัดการข้อมูลข่าวสารเว็บไซต์</legend>
<form class="form-horizontal" action="save_news.php" method="post">
	
	
	<div class="control-group">
		<label for="fname" class="control-label">หัวข้อข่าวประกาศ</label>
		<div class="controls">
                    <input type="text" style="width: 850px"name="news_name" value="<?php echo @$val['news_name']; ?>" >
		</div>
	</div>
	<div class="control-group">
		<label for="lname" class="control-label">รายละเอียด</label>
		<div class="controls">
			 <textarea rows="20" cols="43" name="news_detail" id="detail" style="width: 640px"class="txt required"><?php echo @$val['news_detail']; ?></textarea>
            <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'detail',{

            skin            : 'kama',
            language        : 'en',
            height            : 400,
            width            : 750,

           toolbar: 'Custom',

            filebrowserBrowseUrl : '/../assets/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : '/../assets/ckfinder/ckfinder.html?Type=Images',
            filebrowserFlashBrowseUrl : '/../assets/ckfinder/ckfinder.html?Type=Flash',
            filebrowserUploadUrl : '/../assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : '/../assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : '/../assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

            } );
        //]]>
    </script>
		</div>
	</div>

	<div class="form-actions">
		<input type="hidden" name="id" value="<?php echo @$val['id']; ?>">
		<input class="btn btn-success btn-large" type="submit" value="บันทึก">
		<a href="index.php?url=index_config.php" class="btn btn-large">ยกเลิก</a>
	</div>
</form>
</div>
