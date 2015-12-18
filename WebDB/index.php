<?php
session_start();
include("include/config.inc.php");
if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "SELECT * FROM AA_CUSTOMER WHERE username='$username' and password='$password'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		// Fetch each row in an associative array
		$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
		
		if($row){
			$_SESSION['ID'] = $row['ID'];
			$_SESSION['FNAME'] = $row['FNAME'];
			$_SESSION['LNAME'] = $row['LNAME'];
			$_SESSION['USERNAME'] = $row['USERNAME'];
			$_SESSION['PASSWORD'] = $row['PASSWORD'];
			if($row['ACCOUNT_ADMIN']==1){
			$_SESSION['Account_Admin'] = true;
			}else{
				$_SESSION['Account_Admin'] = false;
			}
		
		}else{
			
			echo "Error";
		}
}

$selected_Type_Navbar = "Home";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="style.css" />
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
<title>หน้าหลัก</title>
</head>

<body>

<!-- Start tag page --->
<div data-role="page" id="foo">
<?php include("include/loginform.php"); include("include/admin_mode.php");?>
<!-- panel left -->
<div data-role="panel" id="panelType" data-position="left" data-display="push">
	
    <ul data-role="listview">
   <?php include('include/list_slidebar.php'); ?>
   	<li><button class="ui-btn ui-corner-all" data-rel="close" >ปิดแท็บ</button></li>
    </ul>
   

</div><!-- /panel -->

<!-- Header image --->
<div data-role="header">
<img src="images/logo.png" />
<div style="float:right; bottom:0px;  width:50%;"><div style="bottom:0;position: absolute;width:50%;" >
<div align="right" style="height:100%;"><?php include("include/login_status.php"); ?></div></div></div>
</div>
<!-- End header image -->

	<div data-role="header">
		<div data-role="navbar">
        <?php include 'include/list_navbar.php' ; ?>
</div><!-- /navbar -->
	</div><!-- /header -->

	<div role="main" class="ui-content">
		<div style="width:100%;"><h3>หนังสือที่เป็นที่นิยมอยู่ในตอนนี้</h3></div>

         <ul class="bxslider" >
		 <?php
		 $query = "SELECT AB.ISBN , AB.BOOKNAME FROM AA_BOOK AB , AA_EACHBOOK AE where AB.ISBN = AE.ISBN order by AE.STATISTICBOOK desc";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		// Fetch each row in an associative array
		
		while($objResult = oci_fetch_array($parseRequest,OCI_BOTH)){
		 ?>
			<li><a href="book.php?id=<?=$objResult['ISBN']?>"><img src="CoverBook/<?=$objResult['ISBN']?>.jpg" title="<?=$objResult['BOOKNAME']?>" style="width:400px;height:auto"/></a></li>
			<?php
		}
		?>
		</ul>
		
		<div style="width:100%;"><h3>New</h3></div>
		<div>
         <ul class="bxslider" style="z-index:-1;">
		 <?php
		 $query = "SELECT ISBN , BOOKNAME FROM AA_BOOK order by DATE_ADD desc";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		// Fetch each row in an associative array
		
		while($objResult = oci_fetch_array($parseRequest,OCI_BOTH)){
		 ?>
			<li><a href="book.php?id=<?=$objResult['ISBN']?>" data-ajax="false"><img src="CoverBook/<?=$objResult['ISBN']?>.jpg" title="<?=$objResult['BOOKNAME']?>" style="width:400px;height:auto"/></a></li>
		<?php
		}
		?>
		</ul>
		</div>
   
        
        
        
        
        
	</div><!-- /content -->


</div><!-- End page -->

  
</body>
</html>