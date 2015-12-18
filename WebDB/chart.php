<?php
session_start();
include("include/config.inc.php");
if($_SESSION['Account_Admin']== false){
		echo '<script>window.location = "index.php";</script>';
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

	<div role="main" class="ui-content" >
	<center>
	<table bgcolor="#ffffff" border="1" style="width:40%">
	<tr>
    <td style="width:40%"><center><h2>วัน</h2></center></td>
    <td><center><h2>เล่ม</h2></center></td>

  </tr>
  <?php
		
		// Fetch each row in an associative array
		
		$query = "select LAST_DAY(to_date(to_char((sysdate),'yyyyMONTH'),'yyyyMONTH'))  from dual";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		$NumberOfDay = oci_fetch_array($parseRequest,OCI_BOTH);
		
		
		$query = "select to_char(sysdate, 'Month-yyyy') from dual";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		$Month_Eng = oci_fetch_array($parseRequest,OCI_BOTH);
		$Month_Eng_cut = explode("-",$Month_Eng[0]);
		
		//echo "Day ".$NumberOfDay[0]."\n";
		
		$current_year_month = explode("-",$NumberOfDay[0]);
		//echo $current_year_month[1]."Current\n";
		$i = 1;
		$count = 0;
		while($i<=$current_year_month[0]){
			 $query = "select count(*)  from AA_RENT where trunc(START_RENT) = TO_DATE('".$current_year_month[2]."-".$current_year_month[1]."-".$i."','YY-Mon-DD')";
		//echo $query."\n";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		$objResult = oci_fetch_array($parseRequest,OCI_BOTH);
		 ?>
  <tr>
    <td><center>วันที่ <?=$i?> <?=$Month_Eng_cut[0]?> <?=$Month_Eng_cut[1]?></center></td>
    <td><center><?=$objResult[0]?></center></td>
  </tr>
   <?php
   $count = $count + $objResult[0];
   $i++;
		}
  ?>
  <tr>
    <td><center>รวมทั้งเดือน</center></td>
    <td><center><?=$count?></center></td>
  </tr>
	</table>
        </center>
        
        
	</div><!-- /content -->


</div><!-- End page -->

  
</body>
</html>