<?PHP
	session_start();
	include("include/config.inc.php");
	if(!isset($_SESSION['USERNAME'])){
		 header( "location: index.php" );
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
<link href="jquery.bxslider.css" rel="stylesheet"/>
<script src="jquery.bxslider.min.js"></script>
<link rel="stylesheet" href="style.css" />
  

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
<!-- not underline for link -->
</style>
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
			
				<?php include('include/list_navbar.php');?>
			
		</div><!-- /navbar -->
	</div><!-- /header -->
	<div role="main" class="ui-content"><b><a href="index.php" data-ajax="false">Home</a> > PROFILE</b>
	<h2 class="ui-bar ui-bar-b ui-corner-all">PROFILE's</h2>
		<div style="width:100%;" >
			<!--Picture & Inform-->
			<table width="100%" border="0" >
			<tr align = "center"><?PHP
					$query = "SELECT * FROM AA_CUSTOMER WHERE username='".$_SESSION['USERNAME']."'";
					$parseRequest = oci_parse($conn, $query);
					oci_execute($parseRequest);
					// Fetch each row in an associative array
					$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
					$ID_Customer = $row['ID'];
				
				?>

			<td align = "left" width="45%" class="ui-body ui-body-a ui-corner-all"><FONT COLOR=red><h1 align = "center">PROFILE</h1></FONT>
				
				<p>	<b>Name : </b><?=$row['FNAME']?> <?=$row['LNAME']?><br/><br/>
					<b>ID : </b> <?=$row['ID']?><br/><br/>
					<b>Address : </b><?=$row['ADDRESS']?><br/><br/>
					<b>Tel :</b><?=$row['TEL']?> <br/><br/>
					<b>Birthday :</b> <?=$row['BIRTHDAY']?> <br/><br/>
					<b>Gender : </b><?=$row['GENDER']?><br/><br/>
					<b>E-mail : </b><?=$row['E_MAIL']?><br/><br/><br/>
				</p>
			</td>
			</tr>
			</table>
		</div><h3 class="ui-bar ui-bar-a ui-corner-all">History</h3></br>
		<table bgcolor="white" width="100%" border="1" cellspacing="2" cellpadding="2" align="center" class="ui-body-d ui-shadow table-stripe ui-responsive" data-column-btn-theme="b"  data-column-popup-theme="a">
			<div style="width:100%;">
				<thead>
					<tr class ="ui-bar-b">
					<td><div align="center"><h3>No. Book</h3></div></td>
					<td><div align="center"><h3>ISBN</h3></div></td>
					<td><div align="center"><h3>Book Title</h3></div></td>
					<td><div align="center"><h3>Start Rent</h3></div></td>
					<td><div align="center"><h3>End Rent</h3></div></td>
					</tr>
				</thead>
				<ul id="list" class="touch" data-role="listview" data-icon="false" data-split-icon="delete">
				<?PHP
					$query = "select EB.ID , B.ISBN,B.BOOKNAME,R.START_RENT,R.END_RENT,EB.STATUSBOOK
								from AA_RENT R,AA_BOOK B,AA_EACHBOOK EB,AA_CUSTOMER C 
								WHERE R.ID_CUSTOMER = '".$_SESSION['ID']."' AND R.ID_CUSTOMER=C.ID AND R.ID_EBOOK = EB.ID AND R.ISBN = B.ISBN
								ORDER BY EB.ID";
					$parseRequest = oci_parse($conn, $query);
					oci_execute($parseRequest);
					while ($row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)) {?>
						<tr>
						<td align="center"><?=$row['ID']?></td>
							<td align="center"><?=$row['ISBN']?></td>
							<td><?=$row['BOOKNAME']?></td>
							<td align="center"><?=$row['START_RENT']?></td>
							<td align="center"><?php if(!isset($row['END_RENT'])){echo "ยังไม่ได้คืนหนังสือ";}else{ echo $row['END_RENT'];} ?></td>
						</tr>
				<?PHP
				}oci_close($conn);
				?>
			</div>
		</table></br>
	</div><!-- /content -->
</div><!-- End page -->

  
</body>
</html>