<?php
if(isset($_POST['submit'])){
	echo $_POST['user'];
	echo $_POST['pass'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="jquery.mobile-1.4.5.min.css" />

	<script src="jquery-2.1.4.min.js"></script>
	<script src="jquery.mobile-1.4.5.min.js"></script>
 <script src="jquery.bxslider.min.js"></script>
<link href="jquery.bxslider.css" rel="stylesheet" />
<script src="jquery.bxslider.min.js"></script>
  

<script>
<!-- http://bxslider.com -->
$(document).ready(function(){
  $('.bxslider').bxSlider({
	  minSlides: 3,
  maxSlides: 5,
  slideWidth:350,
  slideMargin: 2  ,
  captions: true,
  auto: true
  });
});
</script>
 <style type="text/css">
body {
	background-image: url(images/brown-background.jpg);
}
A:link	{
text-decoration:none;
}
A:visited	{
text-decoration:none;
}

</style>
<title>Untitled Document</title>
</head>

<body>

<!-- Start tag page --->
<div data-role="page" id="foo">
<?php 
include("include/loginform.php");
?>
<!-- panel left -->
<div data-role="panel" id="panelType" data-position="left" data-display="push">
	
    <ul data-role="listview">
   <?php include('include/list_slidebar.php'); ?>
   	<li><button class="ui-btn ui-corner-all" data-rel="close" >ปิดแท็บ</button></li>
    </ul>
   

</div><!-- /panel -->

<!-- Header image --->
<div data-role="header">
	<img src="images/logo.gif" />
<div style="float:right; bottom:0px;  width:50%;"><div style="bottom:0;position: absolute;width:50%;" >
<div align="right" style="height:100%;">ยินดีต้อนรับ xxxxxxxx, <a href="#popupLogin"  data-rel="popup"  data-position-to="window" data-transition="pop" >ล็อคอิน</a></div></div></div>
</div>
<!-- End header image -->

<div data-role="header">
		<div data-role="navbar">
			<ul>
				<?php include('include/list_navbar.php'); ?>
			</ul>
		</div><!-- /navbar -->
</div><!-- /header -->

<div role="main" class="ui-content"><b><a href="#">Home</a> > <a href="#">Children</a></b>
<h3 class="ui-bar ui-bar-b ui-corner-all">Children</h3>
	<div style="width:100%;">
		<table width="100%" height="400" border="0">
		  <tr>
			<td width="15%"></td>
			<td width="70%" align="center">
				<table width="90%" height="500" border="0" align="center">
				  <tr>
					<td colspan="2" rowspan="2" width="50%" height="500" ><a href="#"><img src="images/books/book1.jpg"" title="Happy trees" style="width:100%;height:100%"/></a></td>
					<td width="25%" height="250"><a href="#"><img src="images/books/book2.jpg" title="Happy trees" style="width:100%;height:100%"/></a></td>
					<td width="25%" height="250"><a href="#"><img src="images/books/book3.jpg"" title="Happy trees" style="width:100%;height:100%"/></a></td>
					</tr>
				  <tr>
					<td width="25%" height="250"><a href="#" ><img src="images/books/book4.jpg"" title="Happy trees" style="width:100%;height:100%"/></a></td>
					<td width="25%" height="250"><a href="#" ><img src="images/books/book5.jpg"" title="Happy trees" style="width:100%;height:100%"/></a></td>
					</tr>
				</table>
			</td>
			<td width="15%"></td>
		  </tr>
		</table>
   
        
        
        
        
        
	</div><!-- /content -->

	<div data-role="footer">
		<h4>Page Footer</h4>
	</div><!-- /footer -->
</div><!-- End page -->

  
</body>
</html>