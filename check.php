<html>
    <head>
        <link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css">
<script language="JavaScript">
	   var HttPRequest = false;

	   function doCallAjax(Search) {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
	
			var url = 'ajaxsearch.php';
			var pmeters = 'mySearch='+Search;
			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{

				 if(HttPRequest.readyState == 3)  // Loading Request
				  {
				   document.getElementById("mySpan").innerHTML = "Now is Loading...";
				  }

				 if(HttPRequest.readyState == 4) // Return Request
				  {
				   document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
				  }
				
			}

	   }
	</script>
    </head>
<body Onload="JavaScript:doCallAjax('');">
<form name="frmMain">
ค้นหาการสมัครของสมาชิก <input type="text" name="txtSearch" id="txtSearch">
<input type="button"class="btn" name="btnSearch" id="btnSearch" value="ค้นหา" OnClick="JavaScript:doCallAjax(document.getElementById('txtSearch').value);">
<br><br>
<span id="mySpan"></span>
</form>
<?php
// ดึงข้อมูลมาใส่ ตัวแปร
$rs = mysql_query('SELECT * FROM tbregister');
?>

<!-- แสดงข้อความการแจ้งเตือน -->
<?php if (isset($_GET['text_alert'])): ?>
    <div class="alert alert-error">
    <?php echo $_GET['text_alert']; ?>
    </div>	
    <?php endif ?>

<div class="alert alert-info">พิมพ์อีเมล์ของท่านที่ต้องการตรวจอสอบ</div>


</body>
</html>