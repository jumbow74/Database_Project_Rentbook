<?php
session_start();
include("/include/config.inc.php");
$ISBN = $_REQUEST['id'];
		if(empty($ISBN)){
			 header( "location: index.php" );
		}
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
<title>NANA SARA : ศูนย์รวมความรู้</title>
</head>

<body>

<!-- Start tag page --->
<div data-role="page" id="foo">
<?php 
	include("include/loginform.php");
	include("include/admin_mode.php");
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
	<?php
		$query = "SELECT B.BOOKNAME, B.PRICERENT, T.NAME TYPE, C.NAME COMPANY, B.WRITER, B.NUM_PAGE, B.DETAIL FROM AA_BOOK B, AA_TYPEBOOK T, AA_COMPANY C WHERE B.ISBN = '$ISBN' AND B.ID_TYPE = T.ID_TYPE AND B.ID_COMPANY = C.ID_COMPANY";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		// Fetch each row in an associative array
		$book = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
		if($book){
			$BookName = $book['BOOKNAME'];
			$PriceRent = $book['PRICERENT'];
			$Type = $book['TYPE'];
			$Company = $book['COMPANY'];
			$Writer = $book['WRITER'];
			$NumPage = $book['NUM_PAGE'];
			$Detail = $book['DETAIL'];
		}oci_close($conn);
	?>
	<b><a href="index.php">Home</a> > <a href="more.php?type_id=<?=$Type?>"><?php echo $Type ?></a> > รายละเอียด</b>
	<h2 class="ui-bar ui-bar-b ui-corner-all">NaNa SaRa</h2>
		<div style="width:100%;">
			<!--Picture & Inform-->
			<table width="100%" border="0">
			<tr>
			<td width="40%" align="center"><img src="CoverBook/<?php echo $ISBN;?>.jpg" title="Tokyo Kiss ฝ่าภารกิจหัวใจให้ได้ใกล้เธอ" width="200" height="300" /></td>
			<td width="90%" class="ui-body ui-body-a ui-corner-all"><FONT COLOR=red><h2>Tokyo Kiss ฝ่าภารกิจหัวใจให้ได้ใกล้เธอ</h2></FONT>
				<p><b>ชื่อผู้แต่ง : </b><?php echo $Writer;?> <br/><br/>
				<b>สำนักพิมพ์ : </b><?php echo $Company;?><br/><br/>
				<b>ISBN : </b><?php echo $ISBN;?> <br/><br/>
				<b>จำนวนหน้า : </b><?php echo $NumPage;?> <br/><br/>
				<b>ราคาเช่า : </b><?php echo $PriceRent;?> บาท<br/><br/><br/>
				</p>
			</td>
			</tr>
			</table>
		</div><h3 class="ui-bar ui-bar-a ui-corner-all">Detail</h3>
		<div class="ui-body ui-body-a ui-corner-all"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $Detail;?>
			</p></div>
        
	</div><!-- /content -->
</div><!-- End page -->

  
</body>
</html>